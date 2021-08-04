<?php

namespace App\Http\Controllers;

use App\Models\Institution;

class InstitutionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Institution::class);

        return view('institutions.index');
    }

    public function show(Institution $institution)
    {
        $this->authorize('view', $institution);

        $institution->load('legalCases');

        $sysEvents = $institution->systemEvents()->latest('ReceivedAt')->paginate(10);

        return view('institutions.show', compact('institution', 'sysEvents'));
    }
}
