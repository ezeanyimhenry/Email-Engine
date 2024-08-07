<?php
namespace App\Http\Controllers;

use App\Models\EmailCampaigns;
use App\Models\EmailTemplate;
use App\Models\ServerConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class CampaignController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    public function index()
    {
        $campaigns = EmailCampaigns::where('user_id', auth()->id())->get();
        return Inertia::render('Campaigns/List', ['campaigns' => $campaigns]);
    }

    public function create()
    {
        $templates = EmailTemplate::where('user_id', auth()->id())->get();
        return Inertia::render('Campaigns/Create', ['templates' => $templates]);
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'email_template_id' => 'nullable|exists:email_templates,id',
        'scheduled_at' => 'nullable|date',
        'send_now' => 'nullable|boolean',
    ]);

    $campaign = EmailCampaigns::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'email_template_id' => $request->email_template_id,
        'scheduled_at' => $request->scheduled_at,
        'status' => $request->send_now ? 'sent' : 'draft',
    ]);

    // Send the campaign if it's scheduled to be sent now or "Send Now" button was clicked
    if ($request->send_now || (!$request->scheduled_at || now()->gte($request->scheduled_at))) {
        $this->sendCampaign($campaign);
    }

    return redirect()->route('campaigns.index');
}


    public function edit(EmailCampaigns $template)
    {
        $this->authorize('update', $template);
        return view('campaigns.edit', compact('template'));
    }
    public function update(Request $request, EmailCampaigns $template)
    {
        $this->authorize('update', $template);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'email_template_id' => 'nullable|exists:email_templates,id',
            'scheduled_at' => 'nullable|date',
            'status' => 'required|in:draft,scheduled,sent',
        ]);

        $template->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('campaigns.index');
    }

    public function destroy(EmailCampaigns $template)
    {
        $this->authorize('delete', $template);
        $template->delete();
        return redirect()->route('campaigns.index');
    }

    protected function sendCampaign(EmailCampaigns $campaign)
    {
        $serverConfig = ServerConfiguration::where('user_id', auth()->id())->firstOrFail();

        // Decrypt sensitive data
        $decryptedPassword = Crypt::decryptString($serverConfig->password);

        // Prepare mail configuration
        $mailConfig = [
            'driver' => 'smtp',
            'host' => $serverConfig->host,
            'port' => $serverConfig->port,
            'encryption' => $serverConfig->encryption,
            'username' => $serverConfig->username,
            'password' => $decryptedPassword,
        ];

        config(['mail' => $mailConfig]);

        Mail::raw($campaign->content, function ($message) use ($campaign) {
            $message->to('recipient@example.com')
                ->subject($campaign->title);
        });

        $campaign->update([
            'status' => 'sent'
        ]);

    }
}
