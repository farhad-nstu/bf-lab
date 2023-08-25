<?php

namespace App\Repositories\admin;
use App\Models\Task;
use App\Models\Status;

class TaskRepository
{
    private $model;
    private $moduleName;
    private $data;

    public function __construct()
    {
        $this->model = Task::class;
        $this->moduleName = 'admin.tasks.';
    }

    public function layout($pageName)
    {
        echo view($this->moduleName.$pageName.'', $this->data);
    }

    public function index($request)
    {
        $this->data = [
            'title'         => 'Tasks List',
            'objData'       => $this->taskData($request),
            'request' => $request,
            'statuses' => Status::all()
        ];
        $this->layout('index');
    }

    public function create()
    {
        $this->data = [
            'title'         => 'Add Task',
            'statuses' => Status::all(),
            'objData'       => ''
        ];
        $this->layout('create');
    }

    public function edit($id)
    {
        $this->data = [
            'title'         => 'Edit Task',
            'statuses' => Status::all(),
            'objData'       => $this->model::find($id)
        ];
        $this->layout('create');
    }

    public function store($request)
    {
        $id = $request->task_id;

        if($id) {
            $task = $this->model::find($id);
        } else {
            $task = new $this->model;
        }
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->status_id = $request->status_id;
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'Successfully saved');
    }

    public function destroy($id)
    {
        $task = $this->model::find($id);
        if($task){
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Deleted successfully');
        } else {
            return redirect()->route('tasks.index')->with('error', 'No task found with this id');
        }
    }

    private function taskData($request) {
        if($request->due_date) {
            $query = $this->model::orderBy('due_date', $request->due_date);
        } else {
            $query = $this->model::orderBy('id', 'ASC');
        }

        if($request->title){
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        if($request->status_id){
            $query->where('status_id', $request->status_id);
        }

        if($request->from_date && $request->to_date) {
            $query->whereBetween('due_date', [$request->from_date, $request->to_date]);
        } elseif($request->from_date) {
            $query->whereDate('due_date', '>=', $request->from_date);
        } elseif($request->to_date) {
            $query->whereDate('due_date', '<=', $request->to_date);
        }
        return $query->get();
    }
}
