<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Models\Conference;


class AdminConferenceController extends Controller
{

    public function index()
{
    $conferences = Conference::orderBy('start_date', 'asc')->get();

    return view('admin.conferences.index', [
        'conferences' => $conferences,
    ]);
}


    public function create(): View
    {
        return view('admin.conferences.create');
    }

   public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'speakers' => 'nullable|string',
        'start_date' => 'required|date',
        'start_time' => 'required',
        'address' => 'required|string|max:255',
    ]);

    Conference::create($validatedData);

    return redirect()->route('admin.conferences.index');
}

public function show(int $id): View
{
    $conference = Conference::findOrFail($id);

    return view('admin.conferences.show', [
        'conference' => $conference,
    ]);
}

public function edit(int $id): View
{
    $conference = Conference::findOrFail($id);

    return view('admin.conferences.edit', [
        'conference' => $conference,
    ]);
}

public function update(Request $request, int $id): RedirectResponse
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'speakers' => 'nullable|string',
        'start_date' => 'required|date',
        'start_time' => 'required',
        'address' => 'required|string|max:255',
    ]);

    $conference = Conference::findOrFail($id);
    $conference->update($validatedData);

    return redirect()->route('admin.conferences.index');
}

    public function destroy(int $id): RedirectResponse
{
    $conference = Conference::findOrFail($id);
    $conference->delete();

    return redirect()->route('admin.conferences.index');
}
}
