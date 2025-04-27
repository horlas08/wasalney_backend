<?php

namespace App\Jobs;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Excels\RecordCustomExport;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class GenerateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $row;

    /**
     * Create a new job instance.
     */
    public function __construct($row)
    {
        $this->row = $row;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $category=Category::where('is_menu',0)->skip($this->row)->first();
        if($category !=null){
            $className='My'.Str::title($category->slug);
            if (!file_exists(app_path('Http/Controllers/'.$className.'Controller.php')))
                app('App\Http\Controllers\GeneratorController')->index($category->slug);
            dispatch(new GenerateJob($this->row+1));
        }

    }
}
