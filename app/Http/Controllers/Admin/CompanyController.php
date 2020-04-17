<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CompanyRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyDataValidation;
class CompanyController extends Controller
{

    private $company;
    public function __construct(CompanyRepositoryInterface $company){
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
       $companies= $this->company->paginate();
       return view('admin.company.index',['companies'=>$companies,'user'=>$user,'title'=>'Companies']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        return view('admin.company.create',['user'=>$user,'title'=>'create']);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyDataValidation $request)
    {
        try{
        $comCreated=$this->company->create($request->all());
        return response()->json(['status'=>1,'message'=>'Company ceated successfully']);
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth::user();
        $company=$this->company->show($id);
            return view('admin.company.edit',['user'=>$user,'title'=>'Edit','company'=>$company]);
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyDataValidation $request, $id)
    {
        try{
            $comCreated=$this->company->update($request->all(),$id);
            return response()->json(['status'=>1,'message'=>'Company updated successfully']);
            }catch(Execption $e){
                return response()->json(['status'=>0,'message'=>$e->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $comdeleted=$this->company->delete($id);
            return response()->json(['status'=>1,'message'=>'Company deleted successfully']);
            }catch(Execption $e){
                return response()->json(['status'=>0,'message'=>$e->getMessage()]);
            }
    }
}
