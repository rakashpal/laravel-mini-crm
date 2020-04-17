<?php namespace App\Repositories;

use App\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    
    public function all(){

    }
    public function create(array $data){
    }
    public function update(array $data, $id){

    }
    public function delete($id){

    }
    public function show($id){

    }

    public function paginate($per_page=10){
        return  Employee::paginate($per_page);
    }

    public function count(){
        return Employee::count();
    }
  
}