<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;

class EmployeeConferenceController extends Controller
{
   

public function index()
{
    $conferences = Conference::orderBy('start_date', 'asc')->get();

    return view('employee.conferences.index', [
        'conferences' => $conferences,
    ]);
}



public function show($id)
{
    $conference = Conference::with('users')->findOrFail($id);

    return view('employee.conferences.show', [
        'conference' => $conference,
        'registeredUserList' => $conference->users,
    ]);
}


}
