<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Project\StoreRequest;
use App\Http\Requests\Api\Project\UpdateRequest;
use App\Http\Resources\Project\ProjectResource;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('category', 'company')->get();
        $projects = ProjectResource::collection($projects);
        return successResponseData($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $project = Project::create([
            'company_id' => auth('company')->id(),
        ] + $request->validated());

        foreach ($request->image as $image) {
            $project->addMedia($image)->toMediaCollection();
        }

        $project = ProjectResource::make($project->load('category', 'company'));
        return successResponseData($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project = ProjectResource::make($project->load('category', 'company'));
        return successResponseData($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        if ($request->image) {
            $project->clearMediaCollection('default');
            foreach ($request->image as $image) {
                $project->addMedia($image)->toMediaCollection();
            }
        }

        $project = ProjectResource::make($project->load('category', 'company'));
        return successResponseData($project->refresh(), 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return successResponseMessage('تم الحذف بنجاح');
    }

    public function self()
    {
        $projects = Project::where('company_id', auth('company')->id())->with('category', 'company')->get();
        // $projects = Project::whereHas('company', function ($query) {
        //     $query->where('id', auth('company')->id());
        // })->with('category', 'company')->get();
        $projects = ProjectResource::collection($projects);

        return successResponseData($projects);
    }
}
