<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editRoute = route('company.edit', $row->id);
                    $deleteRoute = route('company.destroy', $row->id);
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
        $companies = Company::paginate(10);
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $data['logo'] = str_replace('public/', '', $logoPath);
        }
        $company = Company::create($data);
        return view('company.index',compact(['data']));

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
       $company_info = Company::where('id',$id)->first();
       return view('company.edit',compact(['company_info']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, string $id)
    {
        $company = Company::find($id);
        if (!$company) {
            return redirect()->route('company.index')->with('error', 'Company not found');
        }
        $data = $request->validated();
        $company->update($data);
        return view('company.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id)->delete();
        if ($company->logo) {
            Storage::delete($company->logo);
        }
        return view('company.index')->with('success', 'Company Deleted successfully');

    }
}
