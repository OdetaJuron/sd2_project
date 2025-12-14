<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminUserController extends Controller
{

    private function getSimpleUserList(): array
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Jonas',
                'surname' => 'Jonaitis',
                'email' => 'jonas@example.com',
            ],
            2 => [
                'id' => 2,
                'name' => 'Petras',
                'surname' => 'Petraitis',
                'email' => 'petras@example.com',
            ],
            3 => [
                'id' => 3,
                'name' => 'Ona',
                'surname' => 'Onaitė',
                'email' => 'ona@example.com',
            ],
        ];
    }

    public function index(): View
    {
        $users = $this->getSimpleUserList();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function edit(int $id): View
    {
        $users = $this->getSimpleUserList();

        if (! isset($users[$id])) {
            abort(404);
        }

        $user = $users[$id];

        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
   
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
        ]);

        
        return redirect()->route('admin.users.index');
    }
}
