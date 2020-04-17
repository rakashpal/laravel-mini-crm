<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class DashboardController extends Controller
{
    private $company;
    private $employee;
    public function __construct(CompanyRepositoryInterface $company,
    EmployeeRepositoryInterface $employee){
        $this->company=$company;
        $this->employee=$employee;
    }

    public function index(){
        $user=Auth::user();
        $com_count=$this->company->count();
        $emp_count=$this->employee->count();
       return view('admin.dashboard',['title'=>'dashboard',
       'user'=>$user,
       'com_count'=>$com_count,
       'emp_count'=>$emp_count]);
    }
   
}
