<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CancelOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderItem;

    /**
     * Create a new job instance.
     */
    public function __construct($orderItem)
    {
        $this->orderItem = $orderItem;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $startTime = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now());
            $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $this->orderItem->date->main);
            $diffInMinutes = $startTime->diffInMinutes($endTime);
            if ($this->orderItem->state->id == 1 && $this->orderItem->driver == null && $diffInMinutes >= 30) {

                if ($this->orderItem->agency != null) {
                    $agency = $this->orderItem->agency->notif_token;
                    sendNotification($agency, 'cancel_order', $this->orderItem, 'success', true);
                } else
                    sendNotification($this->orderItem->delivery_id->token, 'cancel_order', $this->orderItem, 'success', true);


                sendNotification($this->orderItem->user->token, 'delete_order', $this->orderItem,'متاسفانه راننده ای درخواست شما را قبول نکرد.', true,1,0);

                if ($this->orderItem->delivery_id->type->id < 3) {
                    $detailMotor=db('order_motor_details')->where('order_id', $this->orderItem->id)->firstRecord();
                    if($detailMotor!=null){
                        db('order_motor_details')->where('order_id', $this->orderItem->id)->deleteRecords();
                    }
                } elseif ($this->orderItem->delivery_id->type->id > 3) {
                    $detail = db('moving_order_details')->where('order_id', $this->orderItem->id)->firstRecord();
                    if ($detail != null) {
                        db('equipment_detail')->parent("moving_order_details", $detail->id)->deleteRecords();
                        db('moving_order_details')->where('id', $detail->id)->where('order_id', $this->orderItem->id)->deleteRecords();
                    }
                }
                db('status')->parent('orders', $this->orderItem->id)->deleteRecords();
                deleteRecord('orders', $this->orderItem->id);
            }

        } catch (\Exception $e) {
            Storage::disk('file')->append('logApi.txt', $e->getMessage());
        }
    }
}
