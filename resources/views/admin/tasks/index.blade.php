@extends('admin.layouts.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/css/datepicker/jquery-1.13.2-ui.min.css') }}">
@endpush
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Task list</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Task</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                      <div class="card-body">
                        <div class="col-10">
                          <h5 class="card-title">Filter task</h5>
                        </div>
                        <div class="col-lg-12">
                          <form method="GET" action="{{ route('tasks.index') }}" class="row g-3 needs-validation"
                              novalidate>
                              <div class="col-6">
                                  <label for="title" class="form-label">Title</label>
                                  <input type="text" name="title" value="{{ getValue('title', $request) }}"
                                      class="form-control" id="title">
                              </div>
                              <div class="col-6">
                                  <label for="due_date" class="form-label">Sort by due date</label>
                                  <select name="due_date" class="form-control">
                                    <option value="">-------</option>
                                      <option {{ getValue('due_date', $request == 'ASC') ? 'selected' : '' }}
                                          value="ASC">ASC</option>
                                      <option {{ getValue('due_date', $request == 'DESC') ? 'selected' : '' }}
                                          value="DESC">DESC</option>
                                  </select>
                              </div>
                              <div class="col-6">
                                  <label for="status_id" class="form-label">Status</label>
                                  <select name="status_id" class="form-control">
                                    <option value="">-------</option>
                                      @foreach ($statuses as $status)
                                          <option {{ getValue('status_id', $request) == $status->id ? 'selected' : '' }}
                                              value="{{ $status->id }}">{{ $status->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-6">
                                  <label for="from_date" class="form-label">Due from</label>
                                  <input type="text" name="from_date" value="{{ getValue('from_date', $request) }}"
                                    class="form-control datepicker" autocomplete="off">
                              </div>
                              <div class="col-6">
                                <label for="to_date" class="form-label">Due to</label>
                                <input type="text" name="to_date" value="{{ getValue('to_date', $request) }}"
                                  class="form-control datepicker" autocomplete="off">
                              </div>
                            </div>
                            <br>
                              <input class="btn btn-primary" type="submit" value="Filter">
                              <a href="{{ route('tasks.index') }}" class="btn btn-warning">Reset</a>
                          </form>
                      </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title">Task list</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="card-title">
                                        <a href="{{ route('tasks.create') }}" class="btn btn-success btn-sm">Add new</a>
                                    </h5>
                                </div>
                            </div>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Due date</th>
                                        <th>Status</th>
                                        <th>Created by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objData as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>{{ Carbon\Carbon::parse($data->due_date)->format('d/m/Y') }}</td>
                                            <td>{{ $data->status->name }}</td>
                                            <td>{{ $data->createdBy->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('tasks.edit', $data->id) }}"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    &nbsp;
                                                    <a onclick="showDeleteModal(`{{ route('tasks.destroy', $data->id) }}`)"
                                                        href="javascript:void(0)" class="btn btn-danger btn-sm"><i
                                                            class="bi bi-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                {{-- Delete modal start --}}
                <div class="modal fade" id="destroy-modal" tabindex="-1" data-bs-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="id_destroy_form" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h6 class="modal-title">Are you sure want to delete? By deleting this task you can not
                                        restore again.</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--  Delete modal end  --}}
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('backend/js/datepicker/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/datepicker/jquery-1.13.2-ui.min.js') }}"></script>
    <script>
        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd",
            maxDate: '0',
            changeMonth: true,
            changeYear: true
        });

        function showDeleteModal(route) {
          $('#id_destroy_form').attr('action', route);
          $("#destroy-modal").modal('show')
        }
    </script>
@endpush
