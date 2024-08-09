<?php
namespace App\Http\Controllers;

use App\Models\EmailCampaigns;
use App\Models\EmailTemplate;
use App\Models\Template;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TemplateController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function index()
    {

        $templates = Template::get();
        return Inertia::render('Templates/List', ['templates' => $templates]);
    }
    public function emailTemplate()
    {

        $templates = EmailTemplate::get();
        return Inertia::render('Templates/UserTemplate', ['templates' => $templates]);
    }

    public function show($id)
    {
        $template = Template::findOrFail($id);
        return Inertia::render('Templates/Show', ['template' => $template]);
    }

    public function create()
    {
        return Inertia::render('Templates/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        EmailTemplate::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return redirect()->route('templates.index');
    }

    // public function edit($id)
    // {
    //     $template = Template::findOrFail($id);
    //     return Inertia::render('Templates/Edit', ['template' => $template]);
    // }

    public function edit(Template $template)
    {
        // $this->authorize('update', $template);
        return Inertia::render('Templates/Edit', ['template' => $template]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $template = Template::findOrFail($id);
        $this->authorize('update', $template);

        $template->update([
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return redirect()->route('templates.index');
    }

    public function destroy($id)
    {
        $template = Template::findOrFail($id);
        $this->authorize('delete', $template);

        $template->delete();
        return redirect()->route('templates.index');
    }

    public function edits($id)
    {

        $template = Template::findOrFail($id);
        return Inertia::render('TemplateEditor', ['templateHtml' => $template->content]);
    }

}
