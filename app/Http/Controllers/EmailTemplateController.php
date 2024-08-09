<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailTemplateController extends Controller
{
    public function index()
    {
        $templates = EmailTemplate::where('user_id', auth()->id())->get();
        return Inertia::render('EmailTemplates/Index', [
            'templates' => $templates
        ]);
    }

    public function create()
    {
        return Inertia::render('EmailTemplates/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|string',
        ]);

        EmailTemplate::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'content' => $request->content,
            'thumbnail' => $request->thumbnail,
        ]);

        return redirect()->route('email-templates.index');
    }

    public function show($id)
    {
        $template = EmailTemplate::findOrFail($id);
        return Inertia::render('EmailTemplates/Show', [
            'template' => $template
        ]);
    }

    public function edit($id)
    {
        $template = EmailTemplate::findOrFail($id);
        return Inertia::render('EmailTemplates/Edit', [
            'template' => $template
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|string',
        ]);

        $template = EmailTemplate::findOrFail($id);
        $template->update([
            'name' => $request->name,
            'content' => $request->content,
            'thumbnail' => $request->thumbnail,
        ]);

        return redirect()->route('email-templates.index');
    }

    public function destroy($id)
    {
        $template = EmailTemplate::findOrFail($id);
        $template->delete();
        return redirect()->route('email-templates.index');
    }
}
