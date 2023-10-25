<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('company_name', function ($data) {
                    return $data->company->name;
                })
                ->addColumn('action', function($row){
                    $editRoute = route('employe.edit', $row->id);
                    $deleteRoute = route('employe.destroy', $row->id);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');
                    $btn = '<div class="btn-group"> <a href="'.$editRoute.'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn.= '<form action="' . $deleteRoute . '" method="POST" >
                        ' . $csrf . '
                        ' . $method . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</button>
                    </form></div>';
                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $employees = Employee::paginate(10);
        return view('employe.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company_list = Company::all();
        return view('employe.create',compact('company_list'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        Employee::create($data);
        return view('employe.index',compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company_list = Company::all();
        $employee_info = Employee::where('id',$id)->first();
        return view('employe.edit',compact(['employee_info','company_list']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, string $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->route('employe.index')->with('error', 'Employee not found');
        }
        $data = $request->validated();
        $employee->update($data);
        return view('employe.index')->with('success', 'Employee Info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();
        return view('employe.index')->with('success', 'Employee Deleted successfully');
    }
}
