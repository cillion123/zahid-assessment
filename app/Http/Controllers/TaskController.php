<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TaskCreatedEvent;
use Inertia\Inertia;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $data['tasks'] = Task::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        return Inertia::render('Tasks/index', $data);
    }
    
    public function create()
    {
        return Inertia::render('Tasks/add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'description' =>'required',
            'due_date' =>'required',
        ]);
        
        try {
            
            $task = new Task;
            $task->user_id = auth()->id();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->status = Task::$STATUS_TODO;
            $task->due_date = date('Y-m-d H:i:s', strtotime($request->due_date));
            $task->reminder = $request->reminder;
            $task->save();

            TaskCreatedEvent::dispatch($task);
            
            return response()->json(['success' => 'Task has been created successfully']);
            
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
    public function edit($id)
    {
        $data['task'] = Task::findOrFail($id);
        return Inertia::render('Tasks/edit', $data);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>'required',
            'description' =>'required',
            'due_date' =>'required',
        ]);
        
        try {
            
            $task = Task::findOrFail($id);
            $task->title = $request->title;
            $task->description = $request->description;
            $task->due_date = $request->due_date;
            $task->reminder = $request->reminder;
            $task->save();
            
            return response()->json(['success' => 'Task has been updated successfully']);
            
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
    public function delete($id)
    {
        try {
            Task::findOrFail($id)->delete();
            return response()->json(['success' => 'Task has been deleted successfully']);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
