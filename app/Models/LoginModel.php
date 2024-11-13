<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginModel extends Model
{

    public function partnerExists($company):bool
    {
       return  DB::table('lowcost_partners')->whereRaw('company="'.$company.'" AND active="1"')->exists();
    }
}
