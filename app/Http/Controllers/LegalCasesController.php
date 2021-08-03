<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use Illuminate\Http\Request;

class LegalCasesController extends Controller
{
    public function index()
    {
        return view('legal-cases.index');
    }

    public function show(LegalCase $legalCase)
    {
        abort_if(!auth()->user()->can('view legal case'), 403);

        $legalCase->load('institution', 'user', 'investigator', 'judicialOfficer');

        $systemEvents = $legalCase->systemEvents()->paginate(10);

        return view('legal-cases.show', compact('legalCase', 'systemEvents'));
    }

    public function publish(LegalCase $legalCase)
    {
        $legalCase->update(['status' => 'published to public']);

        session()->flash('flash.banner', 'Successfully published legal case to public');
        session()->flash('flash.bannerStyle', 'success');


        return back();
    }

    public function unpublish(LegalCase $legalCase)
    {
        $legalCase->update(['status' => 'concluded']);

        session()->flash('flash.banner', 'Successfully unpublished legal case to public');
        session()->flash('flash.bannerStyle', 'success');


        return back();
    }
}
