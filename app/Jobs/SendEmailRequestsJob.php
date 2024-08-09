<?php

namespace App\Jobs;

use App\Mail\CustomEmail; // Make sure to create this Mailable class
use App\Models\EmailRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailRequestsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('SendEmailRequestsJob is being handled');

        // Fetch pending email requests
        $requests = EmailRequest::with('template')->where('status', 'pending')->get();

        foreach ($requests as $request) {
            $template = $request->template;
            $htmlContent = $template->content;

            // Debug: Log the initial email content
            Log::info('Initial HTML Content:', ['content' => $htmlContent]);

            // Check if 'variables' is set
            if (isset($request->variables)) {
                $variables = is_string($request->variables) ? json_decode($request->variables, true) : $request->variables;

                if (is_array($variables)) {
                    foreach ($variables as $key => $value) {
                        $placeholder = '{{' . $key . '}}';
                        if (strpos($htmlContent, $placeholder) !== false) {
                            $htmlContent = str_replace($placeholder, $value, $htmlContent);
                        } else {
                            Log::warning('Placeholder not found in HTML content:', ['placeholder' => $placeholder]);
                        }
                    }
                } else {
                    Log::error('Variables are not in the expected format.', ['variables' => $request->variables]);
                }
            } else {
                Log::warning('Request variables are not set.', ['variables' => $request->variables]);
            }

            // Debug: Log the final HTML content
            Log::info('Final HTML Content:', ['content' => $htmlContent]);

            Log::info('Processing request: ' . $request->id);

            try {
                // Send the email
                Mail::to($request->recipient)
                    ->send(new CustomEmail($request->subject, $htmlContent));

                // Update request status
                $request->update(['status' => 'sent']);
            } catch (\Exception $e) {
                Log::error('Failed to send email request ' . $request->id . ': ' . $e->getMessage());
                // Optionally update the status to 'failed' or another status to handle retries
                $request->update(['status' => 'failed']);
            }
        }
    }
}
