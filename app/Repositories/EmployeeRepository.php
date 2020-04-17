<?php namespace App\Repositories;

use App\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    
    public function all(){

    }
    public function create(array $data){
        return Employee::create([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email'=>$data['email']??null,
            'phone'=>$data['phone']??null,
            'company_id'=>$data['company_id']
        ]);
    }
    public function update(array $data, $id){
        return Employee::where('id',$id)->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'email'=>$data['email']??null,
            'phone'=>$data['phone']??null,
            'company_id'=>$data['company_id']
        ]);
    }
    public function delete($id){

    }
    public function show($id){
        return Employee::where('id',$id)->first();
    }

    public function paginate($per_page=10){
        return  Employee::paginate($per_page);
    }

    public function count(){
        return Employee::count();
    }
  
}