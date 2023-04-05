<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $result['users_1'] = User::where('type', '1')->orderBy('id', 'DESC')->get();
        $result['users_2'] = User::where('type', '2')->orderBy('id', 'DESC')->get();
        $result['users_3'] = User::where('type', '3')->orderBy('id', 'DESC')->get();
        return view('index', $result);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        if ($request->user_type == '2') {
            $certification_required = 'required';
        } else {
            $certification_required = 'nullable';
        }

        if ($request->user_type == '3') {
            $certification_required = 'required';
            $date_required = 'required';
        } else {
            $certification_required = 'nullable';
            $date_required = 'nullable';
        }
        $request->validate([
            'user_type' => ['required', 'numeric'],
            'username' => ['required', 'string', 'unique:users,username'],
            'email' => ['required', 'string', 'unique:users,email'],
            'bio' => ['required', 'string'],
            'certification_title' => [$certification_required, 'string'],
            'certification_file' => [$certification_required],
            'date_of_birth'  => [$date_required, 'date'],
        ]);

        $user = new User();
        $user->type = $request->user_type;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();

        if ($request->user_type == '2') {
            $userDetails = new UserDetail();
            $userDetails->user_id = $user->id;

            $userDetails->certification_title = $request->certification_title;
            if ($request->hasFile('certification_file')) {
                $path = 'uploads/certifications/';
                $file = $request->file('certification_file');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move($path, $fileName);
                $userDetails->certification_file = $path . $fileName;
            }
            $userDetails->save();
        }

        if ($request->user_type == '3') {
            $userDetails = new UserDetail();
            $userDetails->user_id = $user->id;

            $userDetails->certification_title = $request->certification_title;
            if ($request->hasFile('certification_file')) {
                $path = 'uploads/certifications/';
                $file = $request->file('certification_file');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move($path, $fileName);
                $userDetails->certification_file = $path . $fileName;
            }

            $userDetails->date_of_birth = $request->date_of_birth;
            $userDetails->save();
        }

        return redirect()->route('index');

    }

    public function delete(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if (File::exists($user->certification_file)) {
            File::delete($user->certification_file);
        }
        return redirect()->route('index');
    }
}
