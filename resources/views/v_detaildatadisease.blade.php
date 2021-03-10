@extends('layout.v_template')
@section('title', 'Details of the Disease')
@section('content')
    <table class="table">
        <tr>
            <th width="200">Disease Name</th>
            <th width="30">:</th>
            <th>{{ $disease->disease_name }}</th>
        </tr>
        <tr>
            <th width="200">Disease Description</th>
            <th width="30">:</th>
            <th>{{ $disease->disease_desc }}</th>
        </tr>
        <tr>
            <th width="200">Disease Solution</th>
            <th width="30">:</th>
            <th>{{ $disease->disease_solution }}</th>
        </tr>
        <tr><a href="/disease" class="btn btn-danger btn-sm-end mb-4">Back</a></tr>
    </table>
@endsection
