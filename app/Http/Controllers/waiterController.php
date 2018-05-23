<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\Input;

class waiterController extends Controller
{
    public function index()
    {
        $recipelist = DB::table('recipes')->get();
        $tablelist = DB::table('tables')->get();
        return view('waiter/index',['recipe' => $recipelist, 'table' => $tablelist]);
    

    }

    public function store(Request $request)
    {
    	$name = Input::get('name');
    	var_dump($name);  	
    }

}
