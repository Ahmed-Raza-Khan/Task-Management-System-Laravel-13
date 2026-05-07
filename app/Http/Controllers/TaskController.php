<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    protected $taskRepo;

    public function __construct(TaskRepositoryInterface $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    /**
     * Display all tasks
     */
    public function index()
    {
        $tasks = $this->taskRepo
            ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    /**
     * Store new task
     */
    public function store(StoreTaskRequest $request)
    {
        $this->taskRepo->create($request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully');
    }

    /**
     * Show single task
     */
    public function show($id)
    {
        $task = $this->taskRepo->find($id);

        $task->load('user');

        return view('tasks.show', compact('task'));
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $task = $this->taskRepo->find($id);
        $users = User::all();

        return view('tasks.edit', compact('task', 'users'));
    }

    /**
     * Update task
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $this->taskRepo->update($id, $request->validated());

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    /**
     * Delete task (Soft Delete)
     */
    public function destroy($id)
    {
        $this->taskRepo->delete($id);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }

    /**
     * Get tasks by user
     */
    public function userTasks($userId)
    {
        $tasks = $this->taskRepo->getByUserPaginated($userId);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Mark task as completed (AJAX)
     */
    public function complete($id)
    {
        $this->taskRepo->markAsCompleted($id);

        return response()->json([
            'success' => true,
            'message' => 'Task completed'
        ]);
    }
}