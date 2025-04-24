<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DownloadClick;
use App\Models\AppLink;

class DownloadClickController extends Controller
{


    public function track(Request $request, $platform)
    {
        $platform = strtolower($platform);

        // Log the click
        DownloadClick::create([
            'platform' => $platform,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Redirect to the actual store link
        $url = AppLink::where('platform', $platform)->value('url') ?? '/';

        return redirect()->away($url);
    }
}
