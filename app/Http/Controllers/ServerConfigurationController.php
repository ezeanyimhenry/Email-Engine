<?php

namespace App\Http\Controllers;

use App\Models\ServerConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ServerConfigurationController extends Controller
{
    public function index()
    {
        $config = ServerConfiguration::where('user_id', auth()->id())->first();
        $config['password'] = Crypt::decryptString($config->password);
        return Inertia::render('ServerConfiguration', ['config' => $config]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'host' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'encryption' => 'required|string|in:ssl,tls',
            'port' => 'required|integer',
        ]);

        $config = ServerConfiguration::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'name' => $request->name,
                'host' => $request->host,
                'username' => $request->username,
                'password' => Crypt::encryptString($request->password),
                'encryption' => $request->encryption,
                'port' => $request->port,
            ]
        );

        return redirect()->route('server-config.index');
    }

    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $path = $request->file('logo')->store('public/logos');
        $logoUrl = Storage::url($path);

        auth()->user()->update(['logo_url' => $logoUrl]);

        return redirect()->route('server-config.index');
    }
}
