<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class DeployController extends Controller
{
    public function handle(Request $request)
    {
        $secret = config('app.deploy_secret');

        // Get the signature from either the request header or $_SERVER
        // $signature = $request->header('X-Hub-Signature-256') ?? $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? null;

        // if (!$signature) {
        //     Log::error('Deployment failed: No signature provided');
        //     return response('No signature provided', 403);
        // }

        // // Get the payload
        // $payload = $request->getContent();

        // // Calculate the expected signature
        // $expectedSignature = 'sha256=' . hash_hmac('sha256', $payload, $secret);
        // Log::info("details", [
        //     'testt'=>$payload,
        //     'received' => $signature,
        //         'expected' => $expectedSignature
        // ]);
        // // Verify the signature
        // if (!hash_equals($expectedSignature, $signature)) {
        //     Log::error('Deployment failed: Invalid signature', [
        //         'received' => $signature,
        //         'expected' => $expectedSignature
        //     ]);
        //     return response('Invalid signature', 403);
        // }


        try {
            // Get the project path from config
            $projectPath = base_path();


            // Execute git pull
            $output = [];
            \exec("cd {$projectPath} && git pull 2>&1", $output, $returnCode);

            if ($returnCode !== 0) {
                Log::error('Deployment failed: Git pull failed', ['output' => $output]);
                return response('Git pull failed: ' . \implode("\n", $output), 500);
            }

            // Clear Laravel cache
            \Artisan::call('cache:clear');


            \Artisan::call('config:clear');
            \Artisan::call('view:clear');

            Log::info('Deployment successful', ['output' => $output]);
            return response('Deployment successful: ' . implode("\n", $output));
        } catch (\Exception $e) {
            Log::error('Deployment failed: ' . $e->getMessage());
            return response('Deployment failed: ' . $e->getMessage(), 500);
        }
    }
}