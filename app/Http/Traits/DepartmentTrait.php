<?php

namespace APP\Http\Traits;
use App\Models\department;

trait departmenttrait{
    public function getdepartment($departmentid){
        return department::find($departmentid);
    }

}
