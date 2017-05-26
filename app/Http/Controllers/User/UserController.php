<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Storage;
use Auth;

class UserController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['listUsers','showUser']]);
        //$this->middleware('active', ['except' => ['showUser']]);
    }
    public function listUsers()
    {
        $title = 'List Users';

        $users = User::paginate(15); 

        return view('models.users.index', compact('title', 'users'));

    }
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        $title = 'Show User';
                
        return view('models.users.show', compact('title', 'user'));
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $title = 'Edit user';
                
        return view('models.users.edit', compact('title', 'user'));
    }
    
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $title = 'Edit user';
        
        $this->updateUserFromRequest($request, $user);

        $validator = validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('models.users.edit', [$id])->withErrors($validator)->withInput();
        }
        if ($request->hasFile('profile_photo') && !$validator->fails()) {
            $image = $request->file('profile_photo');
            $filename = $image->getClientOriginalName();
            $image = $request->file('profile_photo')->store('profiles');
            $user->profile_photo = $filename;
        }
        
        $message = ['message_success' => 'User updated successfully'];
        if (!$user->save()) {
            $message = ['message_error' => 'failed to updated user'];
        }


        return redirect()->route('user.show', [$id])->with($message);
    }

    protected function validator(array $data)
    {
        // department_id -> will make sure the selected value exists in the departments table on the id column
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'department_id' => 'required|exists:departments,id',
        ]);
    }

    private function updateUserFromRequest(Request $request, $user)
    { 
        $user->update($request->all());
        
        return $user;
    }

    public function sendRegistration($id)
    {
        $user = User::findOrFail($id);

        Mail::send('auth.emails.verification', ['user' => $user], function($message) use ($user)
        {
            $message->from('iprintit.ainet@gmail.com', "PrintIT::Team");
            $message->subject("PrintIT - Confirme a sua conta");
            $message->to($user->email);
        });
    }

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
