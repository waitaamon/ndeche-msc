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

    public function show($id)
    {
        abort_if(!auth()->user()->can('view legal case'), 403);

        $legalCase = LegalCase::findOrFail($id);
    }
}
