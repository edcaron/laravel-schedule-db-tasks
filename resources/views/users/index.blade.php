@extends('layouts.app')

@section('content')

	<div class="container">
		@if (session('message') == 'ok')
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  			Operação realizada com sucesso.
			</div>
		@endif

		<ol class="breadcrumb" style="margin-bottom: 5px;">
		    <li><a href='/'>Início</a></li>
		    <li class="active">Usuários</li>
		</ol>

		<h3>Usuários</h3>
		<a href="{{ route('users.create') }}" class="btn btn-default">Novo Usuário</a>
		<br />
		<br />

		<table id="dList" class="table table-striped table-hover dt-responsive nowrap" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Ação</th>
				</tr>
			</tfoot>
		</table>
	</div>
@endsection

@section('scripts')
	<script>

		$( document ).ready(function() {
			$('#dList').DataTable({
				processing: true,
				serverSide: true,
				dom: 'lBfrtip',
				ajax: '{!! route('users.datatable') !!}',
				columns: [
				{ data: 'id', name: 'id' },
				{ data: 'name', name: 'name' },
				{ data: 'email', name: 'email' },
				{ data: null, render: function ( data, type, row ) {
					return "<a href=\"/users/edit/" + data.id +  "\"class=\"btn-sm btn-success\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> Editar</a>" +
					"<a href=\"javascript:showConfirmDeleteDialog(\'/users/delete/" + data.id + "\')\" class=\"btn-sm btn-danger\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i> Apagar</a>";
				}, orderable: false, "bSearchable": false },
				],
				"order": [[ 0, "desc" ]],
				responsive: true,
			});
		});
	</script>
@endsection