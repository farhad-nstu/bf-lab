<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\StatusRequest;
use App\Repositories\admin\StatusRepository;

class StatusController extends Controller
{
    private $status;
    public function __construct(StatusRepository $status){
        $this->status = $status;
    }

    public function index()
    {
        return $this->status->index();
    }

    public function store(StatusRequest $request)
    {
        return $this->status->store($request);
    }
}
