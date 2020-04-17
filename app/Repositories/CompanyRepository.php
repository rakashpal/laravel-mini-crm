<?php namespace App\Repositories;

use App\Company;
use App\Repositories\Interfaces\CompanyRepositoryInterface;

class CompanyRepository implements  CompanyRepositoryInterface
{
    
    public function all(){
        return Company::all();
    }
    public function create(array $data){
        return Company::create([
            'name'=>$data['name'],
            'email'=>$data['email']??null,
            'website'=>$data['website']??null,
            'logo'=>$data['logo']??null
        ]);
    }
    public function update(array $data, $id){

    }
    public function delete($id){

    }
    public function show($id){

    }
    public function paginate($per_page=10){
        return  Company::paginate($per_page);
    }

    public function count(){
        return Company::count();
    }
  
}