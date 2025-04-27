<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class RCHJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $rch;
    protected $start;

    /**
     * Create a new job instance.
     */
    public function __construct($rch, $start)
    {
        $this->rch = $rch;
        $this->start = $start;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $path=str_replace("/files/","/",$this->rch->file->main);
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

                        db('sub_optimization_rch')->parent('optimization_rch', $this->rch->id)->storeRecord([
                            "title" => $rows[0],
                            "rch" => $rows[1],
                            "gis" => $rows[2],
                            "mon" => $rows[3],
                            'year' => intval($this->rch->date_start)+($this->start),
                            "areakm2" => (float)$rows[4],
                            "flow_incms" => (float)$rows[5],
                            "flow_outcms" => (float)$rows[6],
                            "evapcms" => (float)$rows[7],
                            "tlosscms" => (float)$rows[8],
                            "sed_intons" => (float)$rows[9],
                            "sed_outtons" => (float)$rows[10],
                            "sedconcmgkg" => (float)$rows[11],
                            "orgn_inkg" => (float)$rows[12],
                            "orgn_outkg" => (float)$rows[13],
                            "orgp_inkg" => (float)$rows[14],
                            "orgp_outkg" => (float)$rows[15],
                            "no3_inkg" => (float)$rows[16],
                            "no3_outkg" => (float)$rows[17],
                            "nh4_inkg" => (float)$rows[18],
                            "nh4_outkg" => (float)$rows[19],
                            "no2_inkg" => (float)$rows[20],
                            "no2_outkg" => (float)$rows[21],
                            "minp_inkg" => (float)$rows[22],
                            "minp_outkg" => (float)$rows[23],
                            "chla_inkg" => (float)$rows[24],
                            "chla_outkg" => (float)$rows[25],
                            "cbod_inkg" => (float)$rows[26],
                            "cbod_outkg" => (float)$rows[27],
                            "disox_inkg" => (float)$rows[28],
                            "disox_outkg" => (float)$rows[29],
                            "solpst_inmg" => (float)$rows[30],
                            "solpst_outmg" => (float)$rows[31],
                            "sorpst_inmg" => (float)$rows[32],
                            "sorpst_outmg" => (float)$rows[33],
                            "reactpstmg" => (float)$rows[34],
                            "volpstmg" => (float)$rows[35],
                            "settlpstmg" => (float)$rows[36],
                            "resusp_pstmg" => (float)$rows[37],
                            "diffusepstmg" => (float)$rows[38],
                            "reacbedpstmg" => (float)$rows[39],
                            "burypstmg" => (float)$rows[40],
                            "bed_pstmg" => (float)$rows[41],
                            "bactp_outct" => (float)$rows[42],
                            "bactlp_outct" => (float)$rows[43],
                            "cmetal1kg" => (float)$rows[44],
                            "cmetal2kg" => (float)$rows[45],
                            "cmetal3kg" => (float)$rows[46],
                            "tot_nkg" => (float)$rows[47],
                            "tot_pkg" => (float)$rows[48],
                            "no3concmgl" => (float)$rows[49],
                            "wtmpdegc" => (float)$rows[50],
                        ]);
                    }
                }
                $counter++;
            }
            fclose($file);
        }


if(intval($this->rch->date_start)+$this->start<=intval($this->rch->date_end)){
    dispatch(new RCHJob($this->rch,$this->start+1));
}
    }
}
