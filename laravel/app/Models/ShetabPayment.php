<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use function PHPUnit\Framework\MockObject\object;

class ShetabPayment extends Model
{

    protected $table = 'payments';

    protected $casts = [
        'details' => 'array'
    ];



    public function pay($callbackUrl)
    {
        $invoice = (new Invoice)->amount($this->amount)->via($this->driver);

        $paymentId=$this->id;

        return Payment::callbackUrl($callbackUrl)
            ->purchase(
                $invoice,
                function ($driver, $transactionId) use ($paymentId) {
                    $payment=ShetabPayment::find($paymentId);
                    $payment->transation_id=$transactionId;
                    $payment->save();

                }

            )->pay()->render();
    }



    public function verify(){
        try{

            try {
                $receipt = Payment::amount($this->amount)->transactionId($this->transation_id)->via($this->driver)->verify();


                $this->refrence_id=$receipt->getReferenceId();
                foreach ((object)((array)$receipt) as $key=>$value){
                    if ($key=='details')
                        $this->details=json_encode($value);
                }
                $this->save();

                return true;
            } catch (InvalidPaymentException $exception) {
                /**
                when payment is not verified, it will throw an exception.
                We can catch the exception to handle invalid payments.
                getMessage method, returns a suitable message that can be used in user interface.
                 **/
                $this->message=$exception->getMessage();
                $this->save();
            }

        } catch (\Exception $e) {
            Storage::disk('log')->append('log.txt', $e->getMessage());
        }
        return false;
    }


    public static function startPayment($amount,$driver){
        $payment=new ShetabPayment();
        $payment->driver=$driver;
        $payment->amount=$amount;
        $payment->uuid=Str::uuid();
        $payment->save();
        return $payment->uuid;
    }

}
