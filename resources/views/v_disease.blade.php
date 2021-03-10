@extends('layout.v_template')
@section('title', 'Diseases Data')
@section('content')
    @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ session('message') }}.
        </div>
    @endif
    <a href="/disease/add" class="btn btn-primary btn-md mb-4">Add Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Disease Name</th>
                <th width="250">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($disease as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->disease_name }}</td>
                    <td>
                        <a href="/disease/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/disease/edit/{{ $data->id }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $data->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($disease as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $data->disease_name }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete it?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                        <a href="/disease/delete/{{ $data->id }}" class="btn btn-outline-light">Yeah, I'm sure</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
