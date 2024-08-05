<?php
namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    public function index()
    {
        $templates = EmailTemplate::where('user_id', auth()->id())->get();
        return view('templates.index', compact('templates'));
    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required',
        ]);

        EmailTemplate::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('templates.index');
    }

    public function edit(EmailTemplate $template)
    {
        $this->authorize('update', $template);
        return view('templates.edit', compact('template'));
    }

    public function update(Request $request, EmailTemplate $template)
    {
        $this->authorize('update', $template);

        $request->validate([
            'title' => 'required|string',
            'content' => 'required',
        ]);

        $template->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('templates.index');
    }

    public function destroy(EmailTemplate $template)
    {
        $this->authorize('delete', $template);
        $template->delete();
        return redirect()->route('templates.index');
    }
}
