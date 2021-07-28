<?php

namespace App\Http\Controllers;

use App\Models\CustomersSearchs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersSearchsController extends Controller{

    public function selectAllCustomersSearchs(){
        
        return CustomersSearchs::all();
    }
}