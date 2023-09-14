@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    Multimedia
@endsection

@section('content_header')
    <div class="container">
        <h2>Multimedia List</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    {{ __('multimedia') }}
                </span>
                <div class="float-right">
                    <a href="{{ route('multimedia.create') }}" class="float-right btn btn-primary btn-sm" data-placement="left">
                        {{ __('Create New') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive"> <!-- Add a responsive container -->
            <table class="table table-bordered table-striped"> <!-- Use Bootstrap table classes -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($multimedia as $media)
                        <tr>
                            <td>{{ $media->id }}</td>
                            <td>{{ $media->name }}</td>
                            <td>
                                @if ($media->type === 'image')
                                    Image
                                @elseif ($media->type === 'video')
                                    Video
                                @elseif ($media->type === 'audio')
                                    Audio
                                @elseif ($media->type === 'file')
                                    File
                                @else
                                    Unknown
                                @endif
                            </td>
                            <td>
                                @if ($media->type === 'image')
                                    <img src="{{ asset($media->url) }}" alt="{{ $media->name }}" width="100">
                                @elseif ($media->type === 'video')
                                    <video src="{{ asset($media->url) }}" controls width="300"></video>
                                @elseif ($media->type === 'audio')
                                    <audio src="{{ asset($media->url) }}" controls></audio>
                                @elseif ($media->type === 'file')
                                    <a href="{{ asset($media->url) }}" target="_blank">{{ $media->name }}</a>
                                @else
                                    Unknown
                                @endif
                            </td>
                            <td>
                                <a class="nav-link dropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: left; padding:5px;">
                                    <form action="{{  route('multimedia.destroy', $media->id)  }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('multimedia.show', $media->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('') }}</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('multimedia.edit', $media->id)}}"><i class="fa fa-fw fa-edit"></i> {{ __('') }}</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" ><i class="fa fa-fw fa-trash"></i> {{ __('') }}</button>
                                    </form>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $multimedia->links() }}
    </div>
@endsection
