<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminConferenceController extends Controller
{
    private function getSimpleConferenceListForAdmin(): array
    {
        return [
            1 => [
                'id' => 1,
            'title' => 'Kodėl verta Kūčių patiekalus valgyti dažniau nei kartą per metus?',
            'date' => '2025-12-11',
            'location' => 'Online',
            'description' => 'Šventės dažnai tampa proga sulėtinti žingsnį, pažvelgti į savo kasdienius įpročius ir atrasti naujus, sveikatai palankesnius kelius į subalansuotą gyvenimą. Kūčių stalas, kupinas tradicinių, paprastų ir maistingų patiekalų, gali tapti įkvėpimo šaltiniu ne tik švenčių vakarui, bet ir kasdieniam maitinimuisi.
Kviečiame jus į nuotolinį seminarą, kuriame kalbėsime apie tai, kaip Kūčių patiekalai gali prisidėti prie geresnės savijautos ir sveikatos – ypač sergant onkologine liga ar lydint sergančiuosius jų kelyje.'
            ],
            2 => [
                 'id' => 2,
            'title' => 'Farmacijos pažangos link: mokslas ir praktika',
            'date' => '2025-11-21',
            'location' => 'Kaunas',
            'description' => 'Pristatomi plataus spektro specialistų -mokslininkų pranešimai apie inovacijas farmacijos praktikoje, inovatyvių produktų tyrimą ir pritaikymą.'
            ],
            3 => [
                'id' => 3,
            'title' => 'Slaugos mokslo ir praktikos aktualijos 2025',
            'date' => '2025-12-12',
            'location' => 'Online',
            'description' => 'Konferencija skirta: visų specializacijų bendrosios praktikos slaugytojams, išplėstinės praktikos slaugytojams, akušeriams, kineziterapeutams, ergoterapeutams, socialiniams darbuotojams, medicinos psichologams, slaugytojo padėjėjams.

Konferencija nemokama.'
            ],
        ];
    }

    private function validateConference(Request $request): void
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);
    }

    public function index(): View
    {
        $conferences = $this->getSimpleConferenceListForAdmin();

        return view('admin.conferences.index', [
            'conferences' => $conferences,
        ]);
    }

    public function create(): View
    {
        return view('admin.conferences.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validateConference($request);

        return redirect()->route('admin.conferences.index');
    }

    public function show(int $id): View
    {
        $conferences = $this->getSimpleConferenceListForAdmin();

        if (!isset($conferences[$id])) {
            abort(404);
        }

        return view('admin.conferences.show', [
            'conference' => $conferences[$id],
        ]);
    }

    public function edit(int $id): View
    {
        $conferences = $this->getSimpleConferenceListForAdmin();

        if (!isset($conferences[$id])) {
            abort(404);
        }

        return view('admin.conferences.edit', [
            'conference' => $conferences[$id],
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validateConference($request);

        return redirect()->route('admin.conferences.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        return redirect()->route('admin.conferences.index');
    }
}
