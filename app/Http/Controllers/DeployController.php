<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class DeployController extends Controller
{
    /**
     * Handle manual deployment using direct shell commands
     */
    public function handle(Request $request)
    {
        try {
            // Get the project path
            $projectPath = base_path();
            Log::info('Starting deployment, project path: ' . $projectPath);

            // First check if we can run git
            $gitVersionOutput = $this->runCommand('git --version');
            if (empty($gitVersionOutput) || strpos($gitVersionOutput, 'git version') === false) {
                Log::error('Git not available: ' . $gitVersionOutput);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Git is not available to the web server user',
                    'details' => $gitVersionOutput
                ], 500);
            }

            Log::info('Git is available: ' . trim($gitVersionOutput));

            // Change to the project directory and run git commands
            $output = $this->runCommand('cd ' . $projectPath . ' && git stash && git pull origin master');

            if (strpos($output, 'error:') !== false || strpos($output, 'fatal:') !== false) {
                Log::error('Deployment failed: Git pull failed', ['output' => $output]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Git pull failed',
                    'details' => $output
                ], 500);
            }

            // Clear Laravel caches
            Artisan::call('optimize:clear');
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('view:cache');

            Log::info('Deployment successful', ['output' => $output]);
            return response()->json([
                'status' => 'success',
                'message' => 'Deployment successful',
                'output' => $output
            ]);

        } catch (\Exception $e) {
            Log::error('Deployment failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Deployment failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Execute a shell command and return the output
     *
     * @param string $command Command to execute
     * @return string Command output
     */
    private function runCommand($command)
    {
        // Log the command being executed
        Log::info('Running command: ' . $command);

        // Use shell_exec to run the command
        $output = shell_exec($command . ' 2>&1');

        // Log a summary of the output
        Log::info('Command output: ' . substr($output ?? 'NULL', 0, 100) . (strlen($output ?? '') > 100 ? '...' : ''));

        return $output ?? '';
    }

    /**
     * Handle GitHub webhook - NO SECURITY (TESTING ONLY)
     * Using direct shell commands instead of Process facade
     */
    public function handleWebhook(Request $request)
    {
        try {
            // Log webhook received
            Log::info('GitHub webhook received', [
                'ip' => $request->ip(),
                'method' => $request->method(),
                'user_agent' => $request->header('User-Agent')
            ]);

            // Get the project path
            $projectPath = base_path();

            // First verify that git is available
            $gitVersionOutput = $this->runCommand('git --version');
            if (empty($gitVersionOutput) || strpos($gitVersionOutput, 'git version') === false) {
                Log::error('Git not available: ' . $gitVersionOutput);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Git is not available to the web server user',
                    'details' => $gitVersionOutput
                ], 500);
            }

            Log::info('Starting deployment from webhook');

            // Run Git commands in sequence with full paths
            $output = $this->runCommand('cd ' . $projectPath .
                       ' && git fetch --all' .
                       ' && git reset --hard origin/master' .
                       ' && git pull origin master');

            if (strpos($output, 'error:') !== false || strpos($output, 'fatal:') !== false) {
                Log::error('Webhook deployment failed: Git pull failed', ['output' => $output]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Git pull failed',
                    'details' => $output
                ], 500);
            }

            // Clear Laravel caches
            Artisan::call('optimize:clear');
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('view:cache');

            // Run migrations if needed
            Artisan::call('migrate', ['--force' => true]);

            Log::info('Webhook deployment successful', ['output' => $output]);
            return response()->json([
                'status' => 'success',
                'message' => 'Deployment successful',
                'details' => $output
            ]);

        } catch (\Exception $e) {
            Log::error('Webhook deployment failed: ' . $e->getMessage(), [
                'exception' => $e
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Deployment failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
