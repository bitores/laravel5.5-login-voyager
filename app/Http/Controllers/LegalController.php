<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function showPrivacy()
    {
        return view('legal.privacy');
    }

    public function showTerms()
    {
        return view('legal.terms');
    }
}
