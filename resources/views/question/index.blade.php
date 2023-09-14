

@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    Question
@endsection

@section('content_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{ route('questions.index') }}" method="GET">
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
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Question') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('questions.create') }}" class="float-right btn btn-primary btn-sm"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                              <a href="{{ route('questions.pdf', ['search' => request('search')]) }}" class="btn btn-success" target="_blank">PDF</a>
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

										<th>Statement</th>
										<th>Statementtwo</th>
										<th>Level Id</th>
										<th>Module Id</th>
										<th>Competency Id</th>
										<th>Author Id</th>
										<th>Type</th>
										<th>Points</th>
                                        <th>File Type</th>
                                        <th>File</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>


                                            <td>{{ $question->id }}</td>
											<td>{{ $question->statement }}</td>
											<td>{{ $question->statementtwo }}</td>

											<td>{{ $question->level_id ? ($question->level ? $question->level->name : 'N/A') : 'N/A' }}</td>
                                            <td>{{ $question->module_id ? ($question->module ? $question->module->name : 'N/A') : 'N/A' }}</td>
                                            <td>{{ $question->competency_id ? ($question->competency ? $question->competency->name : 'N/A') : 'N/A' }}</td>
                                            <td>{{ $question->author_id ? ($question->author ? $question->author->name : 'N/A') : 'N/A' }}</td>


											<td>{{ $question->type }}</td>
											<td>{{ $question->points }}</td>
                                            <td>{{ $question->typefile }}</td>

                                            <td>
                                                @if ($question->typefile === 'image')
                                                    <img src="{{ asset('images/question/' . $question->url) }}" alt="question Image" width="150">
                                                @elseif ($question->typefile === 'audio')
                                                    <audio controls>
                                                        <source src="{{ asset('images/question/' . $question->url) }}" type="audio/mpeg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="nav-link dropdown" href=""  role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: left; padding:5px;">
                                                <form action="{{ route('questions.destroy',$question->id)  }}" method="POST">
                                                    <a href="{{ route('questions.show', ['questionId' => $question->id]) }}">View Details</a>


                                                    <a class="btn btn-sm btn-primary " href="{{route('questions.show',$question->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('questions.edit',$question->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('') }}</a>
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
                    </div>
                </div>
                {!! $questions->links() !!}
            </div>
        </div>
    </div>
@stop
