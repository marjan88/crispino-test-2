<?php

namespace Modules\Task\Http\Controllers;

use Chatty\Http\Controllers\Controller;
use Modules\Task\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Modules\Task\Http\Requests\storeTaskRequest;

class TaskController extends Controller {

    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
        $this->middleware('auth');
    }

    public function index() {
        return view('task::index');
    }

    public function create() {
        $task = false;
        return view('task::create_edit', compact('task'));
    }

    public function store(storeTaskRequest $request) {
        if (\Request::isMethod('post')) {
            $task = $this->taskRepository->storeTask($request);
            return redirect('/')->with('success', 'Successfully created a new task');
        }
        return redirect()->back();
    }

    public function edit($id) {
        $task = $this->taskRepository->getTask($id);
        return view('task::create_edit', compact('task'));
    }

    public function update(storeTaskRequest $request, $id) {
        if (\Request::isMethod('post')) {
            $task = $this->taskRepository->updateTask($request, $id);
            return redirect('/')->with('success', 'Successfully updated task');
        }
        return redirect()->back();
    }

    public function destroy($id) {

        $task = $this->taskRepository->deleteTask($id);
        if ($task)
            return redirect('/')->with('success', 'Successfully deleted task');
        return redirect()->back();
    }

    public function order(Request $request) {
        if (\Request::isMethod('post')) {
            $task = $this->taskRepository->orderTasks($request->all());
            if ($task)
                return response()->json(['success' => true]);
            return response()->json(['error' => true]);
        }
        return response()->json(['error' => true]);
    }

}
