@extends('layout.v_template')
@section('title', 'Add Disease Data')
@section('content')
    <form action="/disease/addData" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Disease Name</label>
                        <input name="disease_name" class="form-control" value="{{ old('disease_name') }}">
                        <div class="text-danger">
                            @error('disease_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Disease Description</label>
                        <input name="disease_desc" class="form-control" value="{{ old('disease_desc') }}">
                        <div class="text-danger">
                            @error('disease_desc')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Disease Solution</label>
                        <input name="disease_solution" class="form-control" value="{{ old('disease_solution') }}">
                        <div class="text-danger">
                            @error('disease_solution')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-md">Save</button>
                        <a href="/disease" class="btn btn-danger btn-md">Cancel</a>
                    </div>
                </div>
            </div>
    </form>
@endsection
