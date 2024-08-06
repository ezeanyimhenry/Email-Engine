<?php
namespace App\Http\Controllers;

use App\Models\EmailCampaigns;
use App\Models\Template;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TemplateController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;
   
    
    public function edits($id)
    {

        $template = Template::findOrFail($id);
        return Inertia::render('TemplateEditor', ['templateHtml' => $template->content]);
    }
    
}
