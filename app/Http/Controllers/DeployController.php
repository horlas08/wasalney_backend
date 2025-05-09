<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;

class DeployController extends Controller
{
    public function handle(Request $request)
    {
        try {
            // Get the project path
            $projectPath = base_path();

            // Execute git pull command
            $process = Process::path($projectPath)
                ->run('cd ' . $projectPath . ' && git stash && git pull origin master');

            if (!$process->successful()) {
                Log::error('Deployment failed: Git pull failed', ['output' => $process->output()]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Git pull failed: ' . $process->output()
                ], 500);
            }

            // Clear Laravel caches
            Artisan::call('optimize:clear');
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('view:cache');

            Log::info('Deployment successful', ['output' => $process->output()]);
            return response()->json([
                'status' => 'success',
                'message' => 'Deployment successful',
                'output' => $process->output()
            ]);

        } catch (\Exception $e) {
            Log::error('Deployment failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Deployment failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
