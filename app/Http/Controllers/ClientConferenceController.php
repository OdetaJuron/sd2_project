<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientConferenceController extends Controller
{

    private function getClientConferencesArrayForProject()
    {

        $conferencesArrayForClientSideProject = [];

        $conferencesArrayForClientSideProject[] = [
            'id' => 1,
            'title' => 'First simple conference about web development',
            'date' => '2025-01-15',
            'location' => 'Vilnius, Main hall',
            'description' => 'This is very simple description for first conference, I hope this is correct.',
        ];

        $conferencesArrayForClientSideProject[] = [
            'id' => 2,
            'title' => 'Second conference for beginners about Laravel framework',
            'date' => '2025-02-10',
            'location' => 'Kaunas, Room 204',
            'description' => 'Here we talk about Laravel basics and how not to be scared of this framework.',
        ];

        $conferencesArrayForClientSideProject[] = [
            'id' => 3,
            'title' => 'Third conference about frontend HTML and CSS things',
            'date' => '2025-03-05',
            'location' => 'Online, Zoom link',
            'description' => 'Just very simple frontend conference, nothing too crazy, more for beginners.',
        ];

        return $conferencesArrayForClientSideProject;
    }


    private function findOneConferenceByIdFromClientArray($allConferencesArray, $conferenceId)
    {
        foreach ($allConferencesArray as $oneConferenceItemFromList) {
            if ((int) $oneConferenceItemFromList['id'] === (int) $conferenceId) {
                return $oneConferenceItemFromList;
            }
        }


        return null;
    }


    public function index()
    {

        $allConferencesArrayForClientListPage = $this->getClientConferencesArrayForProject();

        return view('client.conferences', [
            'conferences' => $allConferencesArrayForClientListPage,
        ]);
    }

    public function show($id)
    {
        $allConferencesArrayForClientListPage = $this->getClientConferencesArrayForProject();

        $oneConferenceForShowPage = $this->findOneConferenceByIdFromClientArray(
            $allConferencesArrayForClientListPage,
            $id
        );

        if ($oneConferenceForShowPage === null) {
            abort(404);
        }

        return view('client.conferences.show', [
            'conference' => $oneConferenceForShowPage,
        ]);
    }

    public function register(Request $request, $id)
    {
        $allConferencesArrayForClientListPage = $this->getClientConferencesArrayForProject();

        $oneConferenceForRegistrationPage = $this->findOneConferenceByIdFromClientArray(
            $allConferencesArrayForClientListPage,
            $id
        );

        if ($oneConferenceForRegistrationPage === null) {
            abort(404);
        }


        $validatedDataForClientRegistrationForm = $request->validate([
            'participant_name' => 'required|string|max:255',
            'participant_email' => 'required|email',
        ]);


        return redirect()
            ->route('client.conferences')
            ->with(
                'client_registration_success_message',
                'Registracija sėkmingai pateikta, tikiuosi, kad forma veikė teisingai.'
            );
    }
}
