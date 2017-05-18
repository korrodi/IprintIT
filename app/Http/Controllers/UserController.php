<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Comment;
use Storage;
use Auth;
use Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['listUsers','showUser']]);
    }

    public function listUsers()
    {
        $title = 'List users';
        $users = User::orderBy('updated_at', 'desc')->paginate(15);

        return view('users.index', compact('title', 'users'));
    }
    public function showUser($id)
    {
        $title = 'Show user';
        $user = User::findOrFail($id);
                
        return view('users.show', compact('title', 'user'));
    }

    public function createUser()
    {
        $title = 'Add user';
        $user = new User();

        return view('users.add', compact('title', 'user'));
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $title = 'Edit user';
                
        return view('users.edit', compact('title', 'user'));
    }
    /*public function addUser(Request $request)
    {
        $title = 'Add user';
        $user = new User();
        
        $user = $this->createUserFromRequest($request);
        
        $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'department_id' => 'required|exists:departments,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withErrors($validator)->withInput();
        }

        $user->password = password_hash($user->password, PASSWORD_DEFAULT);

        $message = ['message_success' => 'User created successfully'];
        if (!$user->save()) {
            $message = ['message_error' => 'failed to create user'];
        }


        return redirect()->route('profile.products')->with($message);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $title = 'Edit user';
        
        $this->updateUserFromRequest($request, $user);

        $validator = Validator::make($request->all(), [
            'name' => 'max:80',
            'email' => 'email | max:255 | unique:users,email,'.$user->id,
            'profile_photo' => 'required | mimes:jpeg,jpg,png,gifmax:10000', // max 10000kb
            'profile_url' => 'url',
            //Problemas em validar textarea 'presentation' => 'required | ...',
        ]);
        if ($validator->fails()) {
            return redirect()->route('users.edit', [$id])->withErrors($validator)->withInput();
        }
        if ($request->hasFile('profile_photo') && !$validator->fails()) {
            $image = $request->file('profile_photo');

            $filename  = Auth::user()->id . '-profile_photo.' . $image->getClientOriginalExtension();
            File::makeDirectory(storage_path('uploads/img' . Auth::user()->id), $mode = 0777, true, true);

            $path = public_path('uploads/img' . Auth::user()->id . '/' . $filename);
            Image::make($image->getRealPath())->resize(150, 150)->save($path);
            $user->profile_photo = $filename;
        }
        
        $message = ['message_success' => 'User updated successfully'];
        if (!$user->save()) {
            $message = ['message_error' => 'failed to updated user'];
        }


        return redirect()->route('profile.products')->with($message);
    }*/
    public function sendRegistration($id)
    {
        $user = User::findOrFail($id);

        Mail::send('auth.emails.verification', ['user' => $user], function($message) use ($user)
        {
            $message->from('iprintit.ainet@gmail.com', "IPrintIT::Team");
            $message->subject("IPrintIT - Confirme a sua conta");
            $message->to($user->email);
        });
    }
    public function confirmRegistration($id)
    {
        $user = User::findOrFail($id);
        if (!$user->activated != 1) {
            $user->activated = 1;
            $user->save();
            Auth::login($user);
        } else {
            $message = ['message_error' => 'User already active'];
        }

        return redirect('/users')->with($message);
        ;
    }
}