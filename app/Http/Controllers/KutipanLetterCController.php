<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\KutipanLetter;
use Auth;

class KutipanLetterCController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kutipanletterc = DB::table('kutipan_letters')
            ->select('kutipan_letters.*')
            ->paginate(5);

        return view('kutipan-letter-c/index', ['kutipanletterc' => $kutipanletterc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $departments = Department::all();
        $divisions = Division::all();
        return view('employees-mgmt/create', [
            'countries' => $countries,
            'departments' => $departments, 'divisions' => $divisions
        ]);
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
        // Upload image
        $path = $request->file('picture')->store('avatars');
        $keys = ['kutipan_nomor', 'riwayat', 'address'];
        $input = $this->createQueryInput($keys, $request);
        $input['picture'] = $path;
        KutipanLetter::create($input);
        DB::table('log_activity')->insert([
            'nip' => Auth::user()->nip,
            'name' => Auth::user()->fullname,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => 'Tambah Kutipan Letter C Nomor : ' . $request['kutipan_nomor']
        ]);
        return redirect()->intended('/kutipan-letter-c')->with('success', 'Kutipan Letter C Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kutipanletterc = KutipanLetter::find($id);
        return view('kutipan-letter-c/edit', ['kutipanletterc' => $kutipanletterc]);
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
        $employee = KutipanLetter::findOrFail($id);
        $this->validateInput($request);
        // Upload image
        $keys = ['kutipan_nomor', 'riwayat', 'address'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('picture')) {
            $path = $request->file('picture')->store('avatars');
            $input['picture'] = $path;
        }

        KutipanLetter::where('id', $id)
            ->update($input);
        DB::table('log_activity')->insert([
            'nip' => Auth::user()->nip,
            'name' => Auth::user()->fullname,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => 'Update Kutipan Letter C Nomor : ' . $request['kutipan_nomor']
        ]);
        return redirect()->intended('/kutipan-letter-c')->with('success', 'Kutipan Letter Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kutipan = KutipanLetter::find($id);
        KutipanLetter::where('id', $id)->delete();
        DB::table('log_activity')->insert([
            'nip' => Auth::user()->nip,
            'name' => Auth::user()->fullname,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => 'Hapus Kutipan Letter C Nomor : ' . $kutipan['kutipan_nomor']
        ]);
        return redirect()->intended('/kutipan-letter-c')->with('success', 'Kutipan Letter Deleted Successfully!');
    }

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $constraints = [
            'kutipan_nomor' => $request['kutipannomorletterc'],
            'address' => $request['address']
        ];
        $kutipanletterc = $this->doSearchingQuery($constraints);
        return view('kutipan-letter-c/index', ['kutipanletterc' => $kutipanletterc, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = DB::table('kutipan_letters')
            ->select('kutipan_letters.*');
        $index = 0;

        foreach ($constraints as $k => $v) {
            if ($v != null) {
                if ($k == 'address') {
                    $query = $query->where($k, 'like', '%'.$v.'%');
                }else {
                    $query = $query->where($k, '=', $v);
                }
            }

            $index++;
        }

        return $query->paginate(5);
    }

    /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name)
    {
        $path = storage_path() . '/app/avatars/' . $name;
        return Response::file($path, ['Content-Type' => 'image/jpeg']);
    }

    private function validateInput($request)
    {
        $this->validate($request, [
            'kutipan_nomor' => 'required|max:60',
            'riwayat' => 'required|max:300'
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
