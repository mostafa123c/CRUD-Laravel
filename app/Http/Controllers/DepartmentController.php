<?php

namespace App\Http\Controllers;

use APP\Http\Traits\departmenttrait;
use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public $departmentmodel;

    public function __construct(Department $department)
    {
        $this->departmentmodel = $department;
    }

    //use departmenttrait;
    public function getdepartment($departmentid){
        return $this->departmentmodel::find($departmentid);
    }


    public function create(){
         return view('department.create');   //path
     }


    /**
     * 1-validate request inputs
     * 2-store in db
     * 3-set sessions
     * 4-redirect to create page
     */

     public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3' ,
            'description' => 'required|min:6'
        ]);

        $this->departmentmodel::create([
            'name' => $request->name ,
            'description' => $request->description
        ]);

        session()->flash('done' , 'department created');

        return redirect(route('depar.create'));

     }

     public function alldepartments()
     {
        //$departments = $this->departmentmodel::get();
        $departments = $this->departmentmodel::select('id','name','description')->get();
        //dd($departments);
        return view('department.alldepartments' , compact('departments'));
     }

     /**
      * 1-validate input
      * 2-delete department
      * 3-set sessions
      * 4-redirect back
      */

    public function delete(request $request)
     {
        $request->validate([
            'department_id' => 'required|exists:departments,id'
        ]);

        $this->departmentmodel::where('id' , $request->department_id)->delete();


       session()->flash('done','department deleted !');


       return redirect()->back();
     }


    //  public function delete($department_id)
    //  {
    //    $depart =department::where('id' , $department_id)->first();
    //    $depart->delete();

    //    session()->flash('done','department deleted !');


    //    return redirect()->back();
    //  }

    public function edit($departmentid){

        $department = $this->getdepartment($departmentid);
        return view('department.edit' , compact('department'));
    }


    public function update(request $request){
        $request->validate([
            'name' => 'required|min:3' ,
            'description' => 'required|min:5',
            'department_id' => 'required|exists:departments,id' ]);

            $department = $this->getdepartment($request->department_id);
            $department->update([
            'name'=> $request->name ,
            'description' => $request->description
        ]);

        session()->flash('done','department updated !');

            return redirect(route('depar.all'));
    }

}

