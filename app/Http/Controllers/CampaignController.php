<?php
namespace App\Http\Controllers;

use App\Models\EmailCampaigns;
use App\Models\EmailTemplate;
use App\Models\Template;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CampaignController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    public function index()
    {
        $campaigns = EmailCampaigns::where('user_id', auth()->id())->get();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'email_template_id' => 'nullable|exists:email_templates,id',
            'scheduled_at' => 'nullable|date',
        ]);

        EmailCampaigns::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('campaigns.index');
    }

    public function edit(EmailCampaigns $template)
    {
        $this->authorize('update', $template);
        return view('campaigns.edit', compact('template'));
    }
    public function edits($id)
    {

        $template = Template::findOrFail($id);
        return Inertia::render('TemplateEditor', ['templateHtml' => $template->content]);
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
}
