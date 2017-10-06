<?php

namespace App\Http\Controllers;

use App\Prospect;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index()
    {
        if (view()->exists(setting('marketing.homepage'))) {
            return view(setting('marketing.homepage'));
        }

        // Default
        return view('marketing.landing');
    }

    public function create(Request $request)
    {
        $email = $request->input('email');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect(route('marketing.homepage'))->with('error', 'Please enter a valid email.');
        }

        $utmSource = $request->input('utm_source');
        $utmCampaign = $request->input('utm_campaign');
        $referrer = $request->input('referrer');

        $prospect = Prospect::create([
            'email' => $email,
            'utm_source' => $utmSource,
            'utm_campaign' => $utmCampaign,
            'referrer' => $referrer,
        ]);

        return redirect(route('marketing.prospect.show'));
    }

    public function show(Request $request)
    {
        return view('marketing.mailinglist');
    }
}
