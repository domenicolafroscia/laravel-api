<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies')->paginate(10);
        return response()->json([
            'result' => $projects,
            'success' => true,
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'result' => $project,
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No project',
            ]);
        }
    }
}
