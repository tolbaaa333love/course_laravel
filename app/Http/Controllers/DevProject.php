<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DevProject extends Controller
{

    public function show_form(){

        return view('project_dev.create');


    }

    public function store(Request $request){

        DB::insert('insert into dev_project (dev_id, project_id) values (?, ?)', [$request->developer_id, $request->project_id]);

        return back();

    }


}
