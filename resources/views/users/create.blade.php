@extends('layouts.app')

@section('content')
	<div class="container">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href='/'>Início</a></li>
            <li><a href='{{route('users.index')}}'>Usuários</a></li>
            <li class="active">Edição de Usuário</li>
        </ol>

		<h3>Usuário</h3>

		@if ($errors->any())
		<ul class="alert alert-warning">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif

		@if (isset($user))
			{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
		@else
			{!! Form::open(array('action' => 'UsersController@store')) !!}
		@endif

		<div class="form-group">
		{!! Form::label('name', 'Nome:') !!}
		{!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('email', 'Email:') !!}
		{!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
		</div>

		@if (!isset($user))
			<div class="form-group">
			{!! Form::label('password', 'Senha:') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
			</div>
		@endif

		<div class="form-group">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>

	<script src="/js/jquery.maskedinput.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(function($){
			$("#cpf").mask("999.999.999-99");
		});
	</script>
@endsection