<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Permissions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{


    public function store()
    {

        $validatedUser = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,$this->id,id'],
            'company_name' => 'required',
            'password' => ['required', Password::default(), 'confirmed']
        ]);
        $user = new User;
        $user->name = $validatedUser['name'];
        $user->email = $validatedUser['email'];
        $user->password = Hash::make($validatedUser['password']);
        $user->permissions = array_sum(request()->permissions);


        $user->save();
        Employer::create(['user_id' => $user->id, 'name' => request()->company_name]);
        if (request()->hasFile('photo')) {
            request()->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $photo_name = time().'.'.request()->image->extension();
            request()->photo->move(public_path('images'), $photo_name);
            $user->employer->profile_picture = $photo_name;
            $user->employer->save();
        }

        Auth::login($user);

        return redirect('/jobs');

    }

    public function create()
    {

        return view('auth.register', ['permissions' => Permissions::all()]);
    }

    public function edit()
    {
        return view('auth.profile', ['permissions' => Permissions::all()]);

    }


    public function update()
    {
        $validatedUser = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id())],
            'company_name' => 'required',
            'old_password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Incorrect Password');
                    }
                },
            ],
        ]);


        Auth::user()->name = $validatedUser['name'];
        Auth::user()->email = $validatedUser['email'];

        if (request('password') != "") {
            request()->validate([
                'password' => [Password::default(), 'confirmed',]
            ]);

            Auth::user()->password = request()->password;
        }

        if (request()->hasFile('photo')) {

            request()->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $photo_name = time().'.'.request()->photo->extension();
            Auth::user()->employer->update(['profile_picture' => $photo_name]);
            request()->photo->move(public_path('images'), $photo_name);
        }

        $permissions = request()->permissions;
        if (Auth::user()->permissions != -1) {
            Auth::user()->permissions = ($permissions == null) ? 0 : array_sum($permissions);
        }
        Auth::user()->save();
        Auth::user()->employer->update([
            'name' => request()->company_name
        ]);
        return redirect('/profile')->with('success', 'Profile updated successfully');
    }

}
