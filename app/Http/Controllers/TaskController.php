<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

   
    public function index(Request $request)
{
    $user = Auth::user();

    
    $filter = $request->query('filter', 'all');

   
    $query = $user->tasks();

    
    if ($filter === 'pending') {
        $query->where('status', 'pending')->whereNull('deleted_at');
    } elseif ($filter === 'completed') {
        $query->where('status', 'completed')->whereNull('deleted_at');
    } elseif ($filter === 'deleted') {
        $query->onlyTrashed();
    } else {
        $query->whereNull('deleted_at');
    }

    
    $tasks = $query->paginate(5)->withQueryString(); 

    return view('tasks.home', compact('tasks', 'filter'));
}

    public function create()
    {
        return view('tasks.new_task');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'in:pending,completed',
        ]);

        $user = Auth::user();
        $user->tasks()->create($request->only(['title', 'description', 'status']));

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.edit_task', compact('task'));
    }

 
    public function update(Request $request, Task $task)
    {
        $this->authorizeTask($task);

        $request->validate([
            'status' => 'in:pending,completed',
        ]);

        $task->update($request->only(['title', 'description', 'status']));

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }


    public function destroy(Task $task)
    {
        $this->authorizeTask($task);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso!');
    }


    public function restore($id)
    {
        $task = Task::onlyTrashed()->where('user_id', Auth::id())->findOrFail($id);
        $task->restore();

        return redirect()->route('tasks.index')->with('success', 'Tarefa restaurada com sucesso!');
    }


    public function forceDelete($id)
    {
        $task = Task::onlyTrashed()->where('user_id', Auth::id())->findOrFail($id);
        $task->forceDelete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída permanentemente!');
    }

    private function authorizeTask(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Ação não autorizada.');
        }
    }
}
