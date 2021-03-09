@extends('layout.v_template')
@section('title', 'Add Data Symptom')
@section('content')
    <form action="/symptom/addData" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Symptom Name</label>
                        <input name="symptom_name" class="form-control" value="{{ old('symptom_name') }}">
                        <div class="text-danger">
                            @error('symptom_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-md">Save</button>
                        <a href="/symptom" class="btn btn-danger btn-md">Cancel</a>
                    </div>
                </div>
            </div>
    </form>
@endsection
