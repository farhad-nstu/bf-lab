@extends('admin.layouts.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/css/datepicker/jquery-1.13.2-ui.min.css') }}">
    <style>
        .alert.alert-danger {
            margin-top: 5px;
            padding: inherit;
        }
    </style>
@endpush
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tasks</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tasks</li>
                    <li class="breadcrumb-item active">Create/Edit</li>
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
                                    <h5 class="card-title">New task create/edit from here...</h5>
                                </div>
                                <div class="col-2">
                                    <h5 class="card-title">
                                        <a href="{{ route('tasks.index') }}" class="btn btn-success btn-sm">Back</a>
                                    </h5>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('tasks.store') }}" class="row g-3 needs-validation"
                                novalidate>
                                @csrf
                                <input type="hidden" value="{{ getValue('id', $objData) }}" name="task_id">
                                <div class="col-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ getValue('title', $objData) }}"
                                        class="form-control" id="title" required>
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="due_date" class="form-label">Due date</label>
                                    <input type="text" name="due_date" value="{{ getValue('due_date', $objData) }}"
                                        class="form-control datepicker" id="id_due_date"
                                        autocomplete="off">
                                    @error('due_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="id_status_id" class="form-label">Status</label>
                                    <select name="status_id" id="id_status_id" class="form-control">
                                        <option value="">--------</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}"
                                                {{ getValue('status_id', $objData) == $status->id ? 'selected' : '' }}>
                                                {{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('status_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="id_description">{!! getValue('description', $objData) !!}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-2">
                                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
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
    </script>
@endpush
