<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function loginscreen()
    {
    	return view('welcome');
    }

    public function signup(){
        return view('createuser');
    }
    public function dashboard(){
        $data = Auth::user();
        return view('dashboard',['data' => $data]);
    }
    public function createuser(Request $request)
    {
        $user = User::where('email',$request->input('email'))->first();
        if($user==null){
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            'password' => \Hash::make($request->input('password')),
            ]);
            
            return redirect('/')->with('status', 'Registration successful! Please log in.');
        }
        return redirect()->back()->withErrors([
            'email' => 'Email was already in the database.',
        ]);
    	
    }
    
    public function authenticate(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withErrors([
            'email' => 'Invalid login name or password.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index(){
        $data = array();
        $data = User::get();
        $user = Auth::user();
        return view('user',['data' => $data,'user' => $user]);
    }

    public function createupdate(Request $request){
        
        $data = ([
            'name' => $request->name,
            'age' => $request->age,
            'active' => $request->active,
            'phone_number' => $request->phone,
            'email' => $request->email,
        ]);
            User::where('id',$request->id)->update($data);
            return 'update';
    }

    public function deleteuser(Request $request){
            User::where('id',$request->id)->delete();
            return 'deleted';
    }
}
