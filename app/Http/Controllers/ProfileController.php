<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('profile', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
        $keys = ['fullname', 'nip', 'email', 'address', 'awal_jabatan', 'akhir_jabatan'];   
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('profile_picture')) {
            $path = $request->file('profile_picture')->store('avatars'); 
            $input['profile_picture'] = $path;
        }
        User::where('id', Auth::user()->id)
            ->update($input);
        DB::table('log_activity')->insert([
            'nip' => Auth::user()->nip,
            'name' => Auth::user()->fullname,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => 'Update Profile'
        ]);
        return redirect()->intended('/profile')->with('success', 'Profile Updated Successfully!');
    }

    private function validateInput($request)
    {
        $this->validate($request, [
            'address' => 'required|max:60',
            'address' => 'required|max:60',
            'email' => 'required|max:60'
        ]);
    }

    private function createQueryInput($keys, $request)
    {
        $queryInput = [];
        for ($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}
