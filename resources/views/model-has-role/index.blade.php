@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    Model Has Role
@endsection


@section('content_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Model Has Role') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('model-has-roles.create') }}" class="float-right btn btn-primary btn-sm"  data-placement="left">
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

										<th>Role Id</th>
										<th>Model Type</th>
										<th>Model Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modelHasRoles as $modelHasRole)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $modelHasRole->id }}</td>
                                            <td>  {{ $modelHasRole->role ? $modelHasRole->role->name ?? 'N/A' : 'N/A' }}</td>
                                            <td>{{ $modelHasRole->model_type }}</td>
                                            <td>  {{ $modelHasRole->user ? $modelHasRole->user->name ?? 'N/A' : 'N/A' }}</td>
                                            <td>
                                                <form action="{{ route('model-has-roles.destroy',$modelHasRole->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('model-has-roles.show',$modelHasRole->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('model-has-roles.edit',$modelHasRole->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $modelHasRoles->links() !!}
            </div>
        </div>
    </div>
@stop
