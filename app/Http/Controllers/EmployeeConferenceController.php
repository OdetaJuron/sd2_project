<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeConferenceController extends Controller
{
    private function getConferencesForEmployeeSection()
    {
        $conferences = [];

        $conferences[] = [
            'id' => 1,
            'title' => 'Kodėl verta Kūčių patiekalus valgyti dažniau nei kartą per metus?',
            'date' => '2025-12-11',
            'location' => 'Online',
            'status' => __('Planned'),
            'description' => 'Šventės dažnai tampa proga sulėtinti žingsnį, pažvelgti į savo kasdienius įpročius ir atrasti naujus, sveikatai palankesnius kelius į subalansuotą gyvenimą. Kūčių stalas, kupinas tradicinių, paprastų ir maistingų patiekalų, gali tapti įkvėpimo šaltiniu ne tik švenčių vakarui, bet ir kasdieniam maitinimuisi.
Kviečiame jus į nuotolinį seminarą, kuriame kalbėsime apie tai, kaip Kūčių patiekalai gali prisidėti prie geresnės savijautos ir sveikatos – ypač sergant onkologine liga ar lydint sergančiuosius jų kelyje.'
        ];

        $conferences[] = [
            'id' => 2,
            'title' => 'Farmacijos pažangos link: mokslas ir praktika',
            'date' => '2025-11-21',
            'location' => 'Kaunas',
            'status' => __('Finished'),
            'description' => 'Pristatomi plataus spektro specialistų -mokslininkų pranešimai apie inovacijas farmacijos praktikoje, inovatyvių produktų tyrimą ir pritaikymą.'
        ];

        $conferences[] = [
            'id' => 3,
            'title' => 'Slaugos mokslo ir praktikos aktualijos 2025',
            'date' => '2025-12-12',
            'location' => 'Online',
            'status' => __('Planned'),
            'description' => 'Konferencija skirta: visų specializacijų bendrosios praktikos slaugytojams, išplėstinės praktikos slaugytojams, akušeriams, kineziterapeutams, ergoterapeutams, socialiniams darbuotojams, medicinos psichologams, slaugytojo padėjėjams.

Konferencija nemokama.'
        ];

        return $conferences;
    }

    private function getClientRegistrationsForEmployeeSection()
    {
        $registrations = [];

        $registrations[] = [
            'conference_id' => 1,
            'name' => 'Jonas',
            'surname' => 'Jonaitis',
            'email' => 'jonas@gmail.com',
        ];

        $registrations[] = [
            'conference_id' => 1,
            'name' => 'Vida',
            'surname' => 'Petrauskaite',
            'email' => 'vida@gmail.com',
        ];

        $registrations[] = [
            'conference_id' => 2,
            'name' => 'Tomas',
            'surname' => 'Kazlauskas',
            'email' => 'tomas@gmail.com',
        ];

        return $registrations;
    }

    public function index()
    {
        $conferences = $this->getConferencesForEmployeeSection();

        return view('employee.conferences.index', [
            'conferences' => $conferences,
        ]);
    }

    public function show($id)
    {
        $conferences = $this->getConferencesForEmployeeSection();

        $selectedConference = null;

        foreach ($conferences as $conference) {
            if ($conference['id'] == $id) {
                $selectedConference = $conference;
                break;
            }
        }

        if ($selectedConference === null) {
            abort(404);
        }

        $allRegistrations = $this->getClientRegistrationsForEmployeeSection();

        $conferenceRegistrations = [];

        foreach ($allRegistrations as $registration) {
            if ($registration['conference_id'] == $id) {
                $conferenceRegistrations[] = $registration;
            }
        }

        return view('employee.conferences.show', [
            'conference' => $selectedConference,
            'registrations' => $conferenceRegistrations,
        ]);
    }
}
