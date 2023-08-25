<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\TaskRequest;
use App\Repositories\admin\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->tasks = $tasks;
    }
    public function index(Request $request)
    {
        return $this->tasks->index($request);
    }
    public function create()
    {
        return $this->tasks->create();
    }
    public function edit($id)
    {
        return $this->tasks->edit($id);
    }
    public function store(TaskRequest $request)
    {
        return $this->tasks->store($request);
    }
    public function destroy($id)
    {
        return $this->tasks->destroy($id);
    }
}
