@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    Confirm Delete
@endsection

@section('content_header')
<h1>Confirm Delete</h1>

<p>Are you sure you want to delete the competency?</p>

<form action="{{ route('competencies.destroy', $competency->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Delete</button>
    <a href="{{ route('competencies.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
