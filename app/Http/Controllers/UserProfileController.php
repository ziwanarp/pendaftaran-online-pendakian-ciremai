<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show(User $user)
    {

        return view('user.profile.show', [
            'title' => 'Profile',
            'user' => $user,

        ]);
    }
}
