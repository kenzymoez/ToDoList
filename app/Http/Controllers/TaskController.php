<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tasks = Task::with('category')->get(); 
        $tasks = Task::all();
        return response()->json([
            "status"=> "Success",
            "message" => "Tasks fetched successfully",
            "data"=> TaskResource::collection($tasks)
        ],200);    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return response()->json([
            "status"=> "success",
            "message"=> "Task created successfully"
            ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with('category')->findOrFail($id);
        return response()->json([
        "status"=> "success",
        "message"=> "Task fetched successfully",
        "data"=> new TaskResource($task)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json([
        "status"=> "success",
        "message"=> "Task updated successfully",
        "data"=> $task
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
