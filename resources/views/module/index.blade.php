@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    Module
@endsection

@section('content_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Module') }}
                            </span>

                             <div class="float-right">

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

										<th>Name</th>
										<th>Description</th>
										<th>Competency</th>
										<th>Author</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modules as $module)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $module->name }}</td>
											<td>{{ $module->description }}</td>
											<td>{{ $module->competency }}</td>
											<td>{{ $module->author }}</td>

                                            <td>
                                                <form action="{{ route('modules.destroy',$module->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('modules.show',$module->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('modules.edit',$module->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $modules->links() !!}
            </div>
        </div>
    </div>
@stop
