<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class TrashedController extends Controller
{
    public function index() {

        $projects = Project::onlyTrashed()->get();

        return view('admin.projects.trashed', compact('projects'));
        
    }

    public function restore($id) {

        $project = Project::withTrashed()->find($id);
        $project->restore();

        return redirect()->route('admin.projects.index')->with('message', 'The project: ' . '"' . $project->title . ':' . '"' . ' ' . 'it was restored successfully');

    }

    public function defDestroy($id) {

        $project = Project::withTrashed()->find($id);
        $project->forceDelete();
        

        return redirect()->route('admin.projects.trashed');
    }
}
