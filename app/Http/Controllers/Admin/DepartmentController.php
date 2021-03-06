<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;



class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data=Department::query()->orderBy('created_at','desc');

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='<button type="button" name="show" id="'.$data->id.'" class="btn btn-info btn-sm waves-effect">Show</button>';
                    $button .=' <a href="' . route('departments.edit', $data->id) . '" class="btn btn-success btn-sm waves-effect">Edit</a>';
                    $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm waves-effect">Delete</button>';
                    return $button;
                })
                ->editColumn('active', function ($data) {
                    return $data->active == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                })
                ->rawColumns(['active','action'])
                ->make(true);
        }

        return view('admin.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['active']=='on' ? $request['active']= '1' : $request['active']='0';

        $rules=array(
            'name'=>'required',
            'name_kh'=>'required',
        );
        $error=Validator::make($request->all(),$rules);
        if($error->fails())
        {
            return response()->json(['error'=>$error->errors()->all()]);
        }
        Department::create($request->all());
        return response()->json(['success'=>'Department has been created!']);
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
        $department=Department::findOrFail($id);
        return view('admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentUpdateRequest $request, $id)
    {
//        dd($request->all());
        $request['active']=='on' ? $request['active']= '1' : $request['active']='0';
//                dd($request->all());
        $department=Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
