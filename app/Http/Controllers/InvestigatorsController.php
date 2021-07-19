<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InvestigatorsController extends Controller
{
    public function show($id)
    {
        $investigator = User::with('investigatorCases.institution')->withCount('investigatorCases')->findOrFail($id);

        return view('investigators.show', compact('investigator'));
    }
}
