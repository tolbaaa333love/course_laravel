<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

use App\Project_image;

use Image;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::get();

        return view('projects.index' , ["projects" => $projects]);


    }

    public function show($id){

        $project = Project::findOrFail($id);

        return view('projects.show' , ['project' => $project]);


    }

    public function create(){

        return view('projects.create');


    }

    public function store (Request $request){

        $request->validate([

            'name' => 'required|string|max:100' ,
            'proj_desc' => 'required|string|max:100' ,

        ]);

        Project::create([

            'name' => $request->name ,
            'proj_desc' => $request->proj_desc ,


        ]);

        return redirect(route('show_all_projects'));



    }

    public function edit($developer_id){

        $result = Project::findOrFail($developer_id);

        return view('projects\edit' , ['result' => $result]);

    }

    public function update(Request $request , $project_id){


        $request->validate([

            'name' => 'required|string|max:100' ,
            'proj_desc' => 'required|string|max:100' ,

        ]);

        Project::where('id' , $project_id)->update([


            'name' => $request->name ,
            'proj_desc' => $request->proj_desc ,

        ]);



        return redirect(route('show_all_projects'));


    }

    public function delete($project_id){

        $project = Project::findOrFail($project_id);

        $project->delete();

        return back();

    }
}
