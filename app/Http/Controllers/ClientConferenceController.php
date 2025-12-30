<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use Illuminate\Support\Carbon;




class ClientConferenceController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}
 

public function index()
{
    $conferences = Conference::orderBy('start_date', 'asc')->get();

    return view('client.conferences', [
        'conferences' => $conferences,
    ]);
}


public function show($id)
{
    $conference = Conference::findOrFail($id);

    return view('client.conferences.show', [
        'conference' => $conference,
    ]);
}



public function register($id)
{
    $conference = Conference::findOrFail($id);
    $user = auth()->user();

    $user->conferences()->syncWithoutDetaching([
        $conference->id => ['registered_at' => Carbon::now()],
    ]);

    return redirect()
    ->route('client.conferences.registrations')
    ->with('successMessage', 'Registracija į konferenciją sėkminga.');

}

}
