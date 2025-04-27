<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class HRUJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $hru;
    protected $start;

    /**
     * Create a new job instance.
     */
    public function __construct($hru, $start)
    {
        $this->hru = $hru;
        $this->start = $start;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $path=str_replace("/files/","/",$this->hru->file->main);
        $envFile = Storage::disk('public_file')->path($path);

        $file = fopen($envFile, "r");
// Iterator Number
        $i = 0;
        $counter = 0;
        $start_row=$this->start*(370*12)+5;
        if ($file) {
            // File is open
            while (($line = stream_get_line($file, 0, "\n")) !== false ) {
                if ((empty(trim($line))) || (preg_match('/^#/', $line) > 0))
                    continue;
                $i++;
                $line = trim($line);
                if ($counter >=$start_row  && $counter <= (4440 + $start_row)) {
                    $rows = explode(' ', str($line)->squish());
                    if ($rows[3] <= 12) {

                        db('sub_optimization_hru')->parent('optimization_hru', $this->hru->id)->storeRecord([
                            "title" => $rows[0],
                            "lulc" => $rows[1],
                            "hru" => $rows[2],
                            "gis" => $rows[3],
                            "sub" => $rows[4],
                            "mgt" => $rows[5],
                            "mon" => $rows[6],
                            'year' => intval($this->hru->date_start)+($this->start),
                            "areakm2" => (float)$rows[6],
                            "precipmm" => (float)$rows[7],
                            "petmm" => (float)$rows[11],
                            "etmm" => (float)$rows[12],
                            "sw_initmm" => (float)$rows[13],
                            "sw_endmm" => (float)$rows[14],
                            "percmm" => (float)$rows[15],
                            "gw_rchgmm" => (float)$rows[16],
                            "da_rchgmm" => (float)$rows[17],
                            "revapmm" => (float)$rows[18],
                            "gw_qmm" => (float)$rows[27],
                            "tmp_avdgc" => (float)$rows[30],
                            "tmp_mxdgc" => (float)$rows[31],
                            "tmp_mndgc" => (float)$rows[32],
                        ]);
                    }
                }
                $counter++;
            }
            fclose($file);
        }


        if(intval($this->hru->date_start)+$this->start<=intval($this->hru->date_end)){
            dispatch(new RCHJob($this->hru,$this->start+1));
        }
    }
}
