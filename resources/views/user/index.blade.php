@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    User
@endsection

@section('content_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="mb-3 input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('User') }}
                            </span>
                            <a href="{{ route('user.pdf', ['search' => request('search')]) }}" class="btn btn-success" target="_blank">PDF</a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Code</th>
                                        <th>Document</th>
                                        <th>Phone</th>
                                        <th>Points</th>
                                        <th>Faculty</th>
                                        <th>State</th>
                                        <th>Level</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->code }}</td>
                                            <td>{{ $user->document }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->points }}</td>
                                            <td>{{ $user->faculty ? $user->faculty->name ?? 'N/A' : 'N/A' }}</td>
                                            <td>{{ $user->state }}</td>
                                            <td>{{ $user->level }}</td>

                                            <td>
                                                <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    </svg>
                                                </a>

                                            </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
