<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;

class HomeController extends Controller
{
    public function __invoke()
    {
        $legalCases = LegalCase::query()->where('status', 'published to public')->get();

       return view('welcome', compact('legalCases'));
    }

    public function show($slug)
    {
        $legalCase = LegalCase::query()->with('institution', 'user', 'investigator', 'judicialOfficer')->where('slug', $slug)->firstOrFail();

        $systemEvents = $legalCase->systemEvents()->paginate(10);

        return view('legal-case', compact('legalCase', 'systemEvents'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
