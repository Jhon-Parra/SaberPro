@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    Multimediaquestion
@endsection

@section('content_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Multimediaquestion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('multimediaquestions.create') }}" class="float-right btn btn-primary btn-sm"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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

										<th>Question Id</th>
										<th>Multimedia Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multimediaquestions as $multimediaquestion)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $multimediaquestion->question->statement }}</td>
                                            <td>
                                                @if ($multimediaquestion->multimedia_id)
                                                    @if ($multimediaquestion->multimedia->type === 'image')
                                                        <img src="{{ $multimediaquestion->multimedia->url }}" alt="Imagen" width="100">
                                                    @elseif ($multimediaquestion->multimedia->type === 'audio')
                                                        <audio controls>
                                                            <source src="{{ $multimediaquestion->multimedia->url }}" type="audio/mpeg">
                                                            Tu navegador no soporta el elemento de audio.
                                                        </audio>
                                                    @else
                                                        N/A
                                                    @endif
                                                @else
                                                    N/A
                                                @endif
                                            </td>

                                            <td>
                                                <a class="nav-link dropdown" href=""  role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: left; padding:5px;">
                                                <form action="{{  route('multimediaquestions.destroy',$multimediaquestion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('multimediaquestions.show',$multimediaquestion->id)  }}"><i class="fa fa-fw fa-eye"></i> {{ __('') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('multimediaquestions.edit',$multimediaquestion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" ><i class="fa fa-fw fa-trash"></i> {{ __('') }}</button>
                                                </form>
                                                </ul>
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $multimediaquestions->links() !!}
            </div>
        </div>
    </div>
@stop
