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
    /**
     * Handle manual deployment
     */
    public function handle(Request $request)
    {
        try {
            // Get the project path
            $projectPath = base_path();

            // Check if Git is installed
            $gitCheck = $this->checkGitInstallation();
            if (!$gitCheck['installed']) {
                $instructions = PHP_OS_FAMILY === 'Windows'
                    ? "Install Git from https://git-scm.com/download/win and ensure it's added to your system PATH."
                    : "Install Git using: sudo apt-get update && sudo apt-get install git";

                Log::error('Git is not installed or not in PATH');
                return response()->json([
                    'status' => 'error',
                    'message' => 'Git is not installed or not in the system PATH',
                    'instructions' => $instructions
                ], 500);
            }

            $gitPath = $gitCheck['path'];
            Log::info('Using Git at: ' . $gitPath);

            // Execute git pull command
            $process = Process::path($projectPath)
                ->timeout(60)
                ->run('cd ' . $projectPath . ' && ' . $gitPath . ' stash && ' . $gitPath . ' pull origin master 2>&1');

            if (!$process->successful()) {
                Log::error('Deployment failed: Git pull failed', [
                    'output' => $process->output(),
                    'error_output' => $process->errorOutput(),
                    'exit_code' => $process->exitCode()
                ]);

                // Provide more helpful error information
                $errorDetails = $process->output() . ' ' . $process->errorOutput();
                $suggestions = '';

                if (strpos($errorDetails, 'Permission denied') !== false) {
                    $suggestions = 'The web server user does not have permission to access the Git repository. ' .
                                  'Please run: sudo chown -R www-data:www-data ' . $projectPath . ' ' .
                                  'or set up SSH keys for the web server user.';
                }

                return response()->json([
                    'status' => 'error',
                    'message' => 'Git pull failed',
                    'details' => $errorDetails,
                    'suggestions' => $suggestions
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

    /**
     * Check if Git is installed
     *
     * @return array with status and path if found
     */
    private function checkGitInstallation()
    {
        // Common paths where git might be installed
        $possibleGitPaths = [
            '/usr/bin/git',
            '/usr/local/bin/git',
            'C:\\Program Files\\Git\\bin\\git.exe',
            'C:\\Program Files (x86)\\Git\\bin\\git.exe',
            'git' // Default PATH
        ];

        foreach ($possibleGitPaths as $gitPath) {
            $testProcess = Process::run('command -v ' . $gitPath . ' 2>&1 || where ' . $gitPath . ' 2>&1');
            if ($testProcess->successful()) {
                return [
                    'installed' => true,
                    'path' => trim($testProcess->output()) ?: $gitPath
                ];
            }
        }

        return ['installed' => false];
    }

    /**
     * Handle GitHub webhook - NO SECURITY (TESTING ONLY)
     */
    public function handleWebhook(Request $request)
    {
        try {
            // Log request details
            Log::info('GitHub webhook received', [
                'ip' => $request->ip()
            ]);

            // Check if Git is installed
            $gitCheck = $this->checkGitInstallation();
            if (!$gitCheck['installed']) {
                $instructions = PHP_OS_FAMILY === 'Windows'
                    ? "Install Git from https://git-scm.com/download/win and ensure it's added to your system PATH."
                    : "Install Git using: sudo apt-get update && sudo apt-get install git";

                Log::error('Git is not installed or not in PATH');
                return response()->json([
                    'status' => 'error',
                    'message' => 'Git is not installed or not in the system PATH',
                    'instructions' => $instructions
                ], 500);
            }

            $gitPath = $gitCheck['path'];
            Log::info('Using Git at: ' . $gitPath);

            // Get the project path
            $projectPath = base_path();

            // Execute git commands
            Log::info('Starting deployment from webhook');

            // First, make a simple test to verify git access
            $testProcess = Process::path($projectPath)
                ->timeout(30)
                ->run($gitPath . ' --version');

            if (!$testProcess->successful()) {
                Log::error('Git version check failed', [
                    'output' => $testProcess->output(),
                    'error' => $testProcess->errorOutput()
                ]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Git version check failed. The web server user may not have permission to run Git.',
                    'details' => $testProcess->output() . ' ' . $testProcess->errorOutput()
                ], 500);
            }

            Log::info('Git version: ' . trim($testProcess->output()));

            // Execute git pull command with absolute path
            $process = Process::path($projectPath)
                ->timeout(120)
                ->run('cd ' . $projectPath . ' && ' . $gitPath . ' fetch --all && ' .
                      $gitPath . ' reset --hard origin/master && ' .
                      $gitPath . ' pull origin master 2>&1');

            if (!$process->successful()) {
                Log::error('Webhook deployment failed: Git pull failed', [
                    'output' => $process->output(),
                    'error_output' => $process->errorOutput(),
                    'exit_code' => $process->exitCode()
                ]);

                // Provide more detailed error information and suggestions
                $errorDetails = $process->output() . ' ' . $process->errorOutput();
                $suggestions = '';

                if (strpos($errorDetails, 'Permission denied') !== false) {
                    $suggestions = 'The web server user does not have permission to access the Git repository. ' .
                                  'Please run: sudo chown -R www-data:www-data ' . $projectPath . ' ' .
                                  'or set up SSH keys for the web server user.';
                }

                return response()->json([
                    'status' => 'error',
                    'message' => 'Git pull failed',
                    'details' => $errorDetails,
                    'suggestions' => $suggestions
                ], 500);
            }

            // Clear Laravel caches
            Artisan::call('optimize:clear');
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('view:cache');

            // Run migrations if needed
            Artisan::call('migrate', ['--force' => true]);

            Log::info('Webhook deployment successful', [
                'output' => $process->output()
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Deployment successful',
                'details' => trim($process->output())
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
