@extends('admin.layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Status</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Status</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title">Status list</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="card-title">
                                        <a href="javascript:void(0)" class="btn btn-success btn-sm"
                                            onclick="modalShow(null,null,null)">Add new</a>
                                    </h5>
                                </div>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objData as $key => $status)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $status->name }}</td>
                                            <td>{{ $status->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm"
                                                        onclick="modalShow(`{{ $status->id }}`, `{{ $status->name }}`, `{{ $status->status }}`)"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
                {{--  Create/Edit modal start  --}}
                <div class="modal fade" id="create-or-edit-modal" tabindex="-1" data-bs-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('status.store') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Create/Edit status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="status_id" id="id_status_id">
                                    <div class="modal-body">
                                        <input type="text" class="form-control" placeholder="Enter title" name="name" id="id_name" required>
                                        <br>
                                        <select name="status" id="id_status" class="form-control">
                                          <option id="option_id1" value="1">Active</option>
                                          <option id="option_id0" value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--  Create/Edit modal end  --}}
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        function modalShow(status_id, name, status) {
            if (status_id) {
                $("#id_status_id").val(status_id)
            } else{
                $("#id_status_id").val('')
            }
            if (name) {
                $("#id_name").val(name)
            } else{
                $("#id_name").val('')
            }
            if (status) {
                $("#option_id"+status).prop('selected',true)
            } else{
                $('#id_status').find($('option')).prop('selected',false)
            }
            $("#create-or-edit-modal").modal('show')
        }
    </script>
@endpush
