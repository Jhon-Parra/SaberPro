
@extends('adminlte::page')
@include('layout.layout')


@section('template_title')
    Answer
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
                                    <form action="{{ route('answers.index') }}" method="GET">
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
                                {{ __('Answer') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('questions.index') }}" class="float-right btn btn-secondary btn-sm" data-placement="left">
                                    {{ __(' ListQuestions') }}
                                </a>
                            </div>

                            <div class="float-right">
                                <a href="{{ route('questions.create') }}" class="float-right btn btn-info btn-sm" data-placement="left">
                                    {{ __('Create New Question') }}
                                </a>
                            </div>
                             <div class="float-right">
                                <a href="{{ route('answers.create') }}" class="float-right btn btn-primary btn-sm"  data-placement="left">
                                  {{ __('Create answers ') }}
                                </a>
                              </div>


                              <a href="{{ route('answers.pdf', ['search' => request('search')]) }}" class="btn btn-success" target="_blank">PDF</a>
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

										<th>Data</th>
										<th>Percentage</th>
										<th>Result</th>
										<th>Question Id</th>
										<th>User Id</th>
										<th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($answers as $answer)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $answer->data }}</td>
											<td>{{ $answer->percentage }}</td>
											<td>{{ $answer->result }}</td>
											<td>{{ $answer->question_id }}</td>
                                            <td>{{ $answer->question_id? ($answer->question? $answer->question->statement: 'N/A') : 'N/A' }}</td>
											<td>{{ $answer->user_id ? ($answer->user? $answer->user->name: 'N/A') : 'N/A' }}</td>

											<td>
                                                @if($answer->imageUrl)
                                                <img src="{{ asset('images/answersimg/' . $answer->imageUrl) }}" alt="Answer Image" width="150">
                                                @endif

                                             </td>

                                            <td>

                                                <a class="nav-link dropdown" href=""  role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: left; padding:5px;">
                                                <form action="{{ route('answers.destroy',$answer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('answers.show',$answer->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('answers.edit',$answer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('') }}</a>
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
                {!! $answers->links() !!}
            </div>
        </div>
    </div>
@stop
