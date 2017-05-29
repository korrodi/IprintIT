<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Storage;
use Auth;
use File;

class UserController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['listUsers','showUser']]);
        //$this->middleware('active', ['except' => ['showUser']]);
    }
    public function listUsers(Request $request, $depId = null, $icon = null)
    {
        if(!$icon) {
            if(!$depId) {
                $title = 'List Users';
                $users = User::paginate(15); 
            } else{
                $title = 'List Users by Department';
                $users = User::where('department_id', $depId)->paginate(15);
            }
        } else {
            $iconName = 1;
            if(!$depId) {
                $title = 'List Users';
                $users = User::orderBy('name')->paginate(15); 
            } else{
                $title = 'List Users by Department';
                $users = User::where('department_id', $depId)->paginate(15);
            }
        }

        return view('models.users.index', compact('title', 'users', 'iconName'));

    }
    public function showUser(User $user)
    {
        $title = 'Show User';
                
        return view('models.users.show', compact('title', 'user'));
    }

    public function editUser(User $user)
    {
        $title = 'Edit user';
                
        return view('models.users.edit', compact('title', 'user'));
    }
    
    public function updateUser(Request $request, User $user)
    {
        $title = 'Edit user';
        
        $this->updateUserFromRequest($request, $user);

        $validator = validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('models.users.edit', [$user])->withErrors($validator)->withInput();
        }
        if ($request->hasFile('profile_photo') && !$validator->fails()) {
            $image = $request->file('profile_photo');
            $storagePath = Storage::put('public/profiles', $image);
            $filename = basename($storagePath);

            $user->profile_photo = $filename;
        }
        
        $message = ['msg' => 'User updated successfully'];
        if (!$user->save()) {
            $message = ['msg' => 'failed to updated user'];
        }

        dd($user);
        return redirect()->route('user.show', [$user])->with($message);
    }

    protected function validator(array $data)
    {
        // department_id -> will make sure the selected value exists in the departments table on the id column
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'department_id' => 'exists:departments,id',
            'presentation' => 'max:150',
            'profile_url' => 'url',
            'profile_photo' => 'image'
        ]);
    }

    private function updateUserFromRequest(Request $request, $user)
    { 
        $user->update($request->all());
        
        return $user;
    }

    /* Funcao de merda */
    public function confirmRegistration($remember_token)
    {
        $users = User::all();
        
        foreach ($users as $user) {
               if($user->remember_token == $remember_token);
        }   
        $user = User::findOrFail($id);
        if ($user->activated === 1) {
            $user->activated = 1;
            $user->save();

            Session::flash('status', "Welcome to PrintIt, Your acount is now verified.");
            flash('Welcome to PrintIt, Your acount is now verified.');
            //Auth::login($user);
        } else {
            $message = ['message_error' => 'User already active'];
        }

        return redirect('/manage')->with($message);
        ;
    }
}
