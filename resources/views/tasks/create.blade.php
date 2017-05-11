@extends('layouts.app')

@section('content')
	<div class="container">
        <ol class="breadcrumb" style="macommandin-bottom: 5px;">
            <li><a href='/'>Início</a></li>
            <li><a href='{{route('tasks.index')}}'>Tarefas</a></li>
            <li class="active">Edição de Tarefa</li>
        </ol>

		<h3>Usuário</h3>

		@if ($errors->any())
			<ul class="alert alert-warning">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
		</ul>
		@endif

		@if (isset($task))
			{!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
		@else
			{!! Form::open(array('action' => 'TasksController@store')) !!}
		@endif

		<div class="form-group">
		{!! Form::label('name', 'Nome:') !!}
		{!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('command', 'Comando:') !!}
		{!! Form::text('command', old('command'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('minute', 'Minuto:') !!}
		{!! Form::text('minute', old('minute'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('hour', 'Hora:') !!}
		{!! Form::text('hour', old('hour'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('day_of_month', 'Dia do mês:') !!}
		{!! Form::text('day_of_month', old('day_of_month'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('month', 'Mês:') !!}
		{!! Form::text('month', old('month'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('day_of_week', 'Dia da semana:') !!}
		{!! Form::text('day_of_week', old('day_of_week'), ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('active', 'Ativo:') !!}
		{!! Form::checkbox('active', old('active'), ['class'=>'form-control']) !!}
		</div>

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