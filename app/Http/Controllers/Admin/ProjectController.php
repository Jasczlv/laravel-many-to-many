<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        $projects = Project::with(['technologies', 'technologies.projects'])->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $technologies = Technology::orderBy('tech', 'asc')->get();
        $types = Type::orderBy('type', 'asc')->get();

        return view('admin.projects.create', compact('technologies', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $base_slug = Str::slug($form_data['description']);
        $slug = $base_slug;
        $n = 0;

        do {

            //cerco se lo slug è già presente dentro al database
            $find = Project::where('slug', $slug)->first();
            if ($find !== null) {
                //se lo slug è già presente

                $n++; //incremento n

                $slug = $slug . '-' . $n; //aggiungo allo slug n concatenato con '-'
            }
        } while ($find !== null); //Lo faccio finchè non trovo un risultato diverso


        $form_data['slug'] = $slug;


        $new_project = Project::create($form_data);

        if ($request->has('technologies')) {
            $new_project->technologies()->attach($request->technologies);
        }


        return to_route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //


        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $form_data = $request->all();
        $project->fill($form_data);
        $project->save();

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }

        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return to_route('admin.projects.index');
    }
}
