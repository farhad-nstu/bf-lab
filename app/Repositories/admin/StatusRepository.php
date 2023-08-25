<?php

namespace App\Repositories\admin;
use App\Models\Status;

class StatusRepository
{
    private $model;
    private $moduleName;
    private $data;

    public function __construct()
    {
        $this->model = Status::class;
        $this->moduleName = 'admin.status.';
    }

    public function layout($pageName)
    {
        echo view($this->moduleName.$pageName.'', $this->data);
    }

    public function index()
    {
        $this->data = [
            'title'         => 'Status List',
            'objData'       => $this->model::all()
        ];
        $this->layout('index');
    }

    public function store($request)
    {
        $id = $request->status_id;

        if($id) {
            $status = $this->model::find($id);
        } else {
            $status = new $this->model;
        }

        $status->name = $request->name;
        $status->status = $request->status;
        $status->save();
        return redirect()->route('status.index')->with('success', 'Successfully saved');
    }

    public function destroy($id)
    {
        $status = $this->model::find($id);
        if($status){
            $status->delete();
            return redirect()->route('statuss.index')->with('success', 'Deleted successfully');
        } else {
            return redirect()->route('statuss.index')->with('error', 'No status found');
        }
    }
}
