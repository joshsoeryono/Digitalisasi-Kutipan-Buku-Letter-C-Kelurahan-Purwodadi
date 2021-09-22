<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use Auth;
use DB;

class UserManagementController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user-management';

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::getUsers()->paginate(5);
        $roles = Roles::all();

        return view('users-mgmt/index', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        User::create([
            'nip' => $request['nip'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'fullname' => $request['fullname'],
            'address' => $request['address'],
            'role_id' => $request['role_id'],
            'awal_jabatan' => $request['awal_jabatan'],
            'akhir_jabatan' => $request['akhir_jabatan']
        ]);

        return redirect()->intended('/user-management')->with('success', 'User Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Roles::all();

        // Redirect to user list if updating user wasn't existed
        if ($user == null) {
            return redirect()->intended('/user-management')
                ->with('error', 'User Update Fail!');
        }

        return view('users-mgmt/edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $constraints = [
            'nip' => 'required|max:20',
            'fullname' => 'required|max:60',
            'role_id' => 'required',
            'address' => 'required',
            'awal_jabatan' => 'required',
            'akhir_jabatan' => 'required'
        ];
        $input = [
            'nip' => $request['nip'],
            'fullname' => $request['fullname'],
            'role_id' => $request['role_id'],
            'address' => $request['address'],
            'awal_jabatan' => $request['awal_jabatan'],
            'akhir_jabatan' => $request['akhir_jabatan']
        ];
        if ($request->file('profile_picture')) {
            $path = $request->file('profile_picture')->store('avatars');
            $input['profile_picture'] = $path;
        }
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }

        $this->validate($request, $constraints);

        User::where('id', $id)
            ->update($input);
        DB::table('log_activity')->insert([
            'nip' => Auth::user()->nip,
            'name' => Auth::user()->fullname,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => 'Update User'
        ]);
        return redirect()->intended('/user-management')->with('success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        DB::table('log_activity')->insert([
            'nip' => Auth::user()->nip,
            'name' => Auth::user()->fullname,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => 'Hapus User'
        ]);
        return redirect()->intended('/user-management')->with('success', 'User Deleted Successfully!');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $constraints = [
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'department' => $request['department']
        ];

        $users = $this->doSearchingQuery($constraints);
        return view('users-mgmt/index', ['users' => $users, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = User::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%' . $constraint . '%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request)
    {
        $this->validate($request, [
            'nip' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'fullname' => 'required|max:60'
        ]);
    }
}
