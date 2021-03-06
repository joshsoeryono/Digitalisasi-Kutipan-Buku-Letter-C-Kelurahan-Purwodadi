<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class LogActivityController extends Controller
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

    public function index()
    {
        date_default_timezone_set('asia/ho_chi_minh');
        $format = 'Y/m/d';
        $now = date($format);
        $to = date($format, strtotime("+30 days"));
        $constraints = [
            'from' => $now,
            'to' => $to
        ];

        $logactivity = DB::table('log_activity')
            ->join('users', 'users.nip', '=', 'log_activity.nip')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('log_activity.*', 'roles.name as rolename')->get();
        return view('log-activity', ['logactivity' => $logactivity]);
    }

    public function exportExcel(Request $request)
    {
        $this->prepareExportingData($request)->export('xlsx');
        redirect()->intended('log-activity');
    }

    public function exportPDF(Request $request)
    {
        $constraints = [
            'from' => $request['from'],
            'to' => $request['to']
        ];
        $employees = $this->getExportingData($constraints);
        $pdf = PDF::loadView('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
        return $pdf->download('report_from_' . $request['from'] . '_to_' . $request['to'] . 'pdf');
        // return view('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
    }

    private function prepareExportingData($request)
    {
        $author = Auth::user()->username;
        $employees = $this->getExportingData(['from' => $request['from'], 'to' => $request['to']]);
        return Excel::create('report_from_' . $request['from'] . '_to_' . $request['to'], function ($excel) use ($employees, $request, $author) {

            // Set the title
            $excel->setTitle('List of Employees from ' . $request['from'] . ' to ' . $request['to']);

            // Chain the setters
            $excel->setCreator($author)
                ->setCompany('SinghatehAlagie');

            // Call them separately
            $excel->setDescription('List of Employees');

            $excel->sheet('Employees', function ($sheet) use ($employees) {

                $sheet->fromArray($employees);
            });
        });
    }

    public function search(Request $request)
    {
        $constraints = [
            'date' => $request['yyyy-mm-dd']
        ];
        if($request['field']!=''){
            $constraints = [
                $request['field'] => $request['query'],
                'date' => $request['yyyy-mm-dd']
            ];
        }
        $logactivity = $this->doSearchingQuery($constraints);

        $constraints = [
            'date' => $request['yyyy-mm-dd'],
            'query' => $request['query'],
            'field' => $request['field']
        ];

        return view('log-activity', ['logactivity' => $logactivity, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = DB::table('log_activity')
            ->join('users', 'users.nip', '=', 'log_activity.nip')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('log_activity.*', 'roles.name as rolename');
        $index = 0;

        foreach ($constraints as $k => $v) {
            if ($v != null) {
                $query = $query->where($k, '=', $v);
            }

            $index++;
        }

        return $query->get();
    }

    private function getExportingData($constraints)
    {
        return DB::table('employees')
            ->leftJoin('city', 'employees.city_id', '=', 'city.id')
            ->leftJoin('department', 'employees.department_id', '=', 'department.id')
            ->leftJoin('state', 'employees.state_id', '=', 'state.id')
            ->leftJoin('country', 'employees.country_id', '=', 'country.id')
            ->leftJoin('division', 'employees.division_id', '=', 'division.id')
            ->select(
                'employees.firstname',
                'employees.middlename',
                'employees.lastname',
                'employees.birthdate',
                'employees.address',
                'country.name as country',
                'employees.zip',
                'employees.date_join',
                'department.name as department_name',
                'division.name as division_name'
            )
            ->where('date_join', '>=', $constraints['from'])
            ->where('date_join', '<=', $constraints['to'])
            ->get()
            ->map(function ($item, $key) {
                return (array) $item;
            })
            ->all();
    }
}
