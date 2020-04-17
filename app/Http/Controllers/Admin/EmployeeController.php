<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\CompanyRepositoryInterface;
use  App\Http\Requests\EmployeeDataValidation;
class EmployeeController extends Controller
{

    private $employee;
    private $company;
    public function __construct(EmployeeRepositoryInterface $employee,
    CompanyRepositoryInterface $company){
        $this->employee=$employee;
        $this->company=$company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
       $employees= $this->employee->paginate();
       return view('admin.employee.index',['employees'=>$employees,'user'=>$user,'title'=>'Employee']);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $companies=$this->company->all();
        return view('admin.employee.create',['user'=>$user,'title'=>'create','companies'=>  $companies]);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeDataValidation $request)
    {
        try{
            $empCreated=$this->employee->create($request->all());
            return response()->json(['status'=>1,'message'=>'Employee ceated successfully']);
            }catch(Execption $e){
                return response()->json(['status'=>0,'message'=>$e->getMessage()]);
            }
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
        //
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
        //
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
