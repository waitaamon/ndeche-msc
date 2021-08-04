<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\SystemEvent;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function debug()
    {
        return  DB::table('SystemEvents')->select('SystemEvents.identifier', 'SystemEvents.FromHost')->groupBy('FromHost')->get();
    }


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
