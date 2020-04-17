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
        return Company::where('id',$id)->update([
            'name'=>$data['name'],
            'email'=>$data['email']??null,
            'website'=>$data['website']??null,
            'logo'=>$data['logo']??null
        ]);
    }
    public function delete($id){
        return Company::where('id',$id)->delete();

    }
    public function show($id){
        return Company::where('id',$id)->first();
    }
    public function paginate($per_page=10){
        return  Company::paginate($per_page);
    }

    public function count(){
        return Company::count();
    }
  
}