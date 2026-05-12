<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->tasks;
    }

    public function store(Request $request)
    {
        return $request->user()->tasks()->create($request->all());
    }

    public function destroy(Request $request, $id)
    {
        $task = Task::where('id', $id)->where('user_id', $request->user()->id)->first();

        if (!$task) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $task->delete();
        return response()->json(['message' => 'Deleted']);
    }
}