<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('role_id') }}
            {{ Form::select('role_id', ['student' => 'Student', 'admin' => 'Admin', 'superadmin' => 'Superadmin'], $modelHasRole->role_id, ['class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('model_type') }}
            {{ Form::text('model_type', 'App\Models\User', ['class' => 'form-control' . ($errors->has('model_type') ? ' is-invalid' : ''), 'placeholder' => 'Model Type', 'readonly' => true]) }}
            {!! $errors->first('model_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('search_users', 'Buscar Usuarios') }}
            {{ Form::text('search_users', null, ['class' => 'form-control', 'id' => 'searchUsers']) }}
        </div>

        <div class="form-group">
            {{ Form::label('model_id', 'Seleccionar Usuario') }}
            {{ Form::select('model_id', [], null, ['class' => 'form-control', 'id' => 'selectUser']) }}
        </div>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Obtén la lista completa de usuarios
        var allUsers = {!! $users !!};

        // Función para actualizar la lista de usuarios en el campo de selección
        function updateSelectUser(searchTerm) {
            var selectUser = $('#selectUser');
            selectUser.empty();

            var filteredUsers = allUsers.filter(function(user) {
                return user.name.toLowerCase().includes(searchTerm.toLowerCase());
            });

            $.each(filteredUsers, function(index, user) {
                selectUser.append(new Option(user.name, user.id));
            });
        }

        // Evento de cambio en el campo de búsqueda
        $('#searchUsers').on('input', function() {
            var searchTerm = $(this).val();
            updateSelectUser(searchTerm);
        });

        // Actualiza la lista de usuarios al cargar la página
        updateSelectUser('');
    });
</script>
