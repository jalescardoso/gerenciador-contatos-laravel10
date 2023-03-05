@extends('layouts.app')
@section('content')
<div class="container">
	<a type="button" class="btn btn-link" href="{{ route('pessoa.index') }}">Pessoas</a>
	@if($pessoa->id)
	<form action="{{ route('pessoa.update', ['id' => $pessoa->id]) }}" method="POST">
		@method('PUT')
		@else
		<form action="{{ route('pessoa.store') }}" method="POST">
			@endif
			{{ csrf_field() }}
			<input type="hidden" name='id' value="{{$pessoa->id}}" />
			<div class="form-group">
				<label class="control-label col-sm-2">Nome:</label>
				<div class="col-sm-10">
					<input class="form-control" required name="nome" value="{{$pessoa->nome}}">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Salvar</button>
				</div>
			</div>
		</form>
</div>
@if($pessoa->id)
<div class="container" ng-if="ctrl.data.id">
	<h2>Contatos</h2>
	<a id="adicionarContato" class="btn btn-default" role="button">Adicionar</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Descrição</th>
				<th>Tipo de contato</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pessoa->contatos as $item)
			<tr>
				<td>{{ $item['descricao'] }}</td>
				<td>{{ $item['tipo'] }}</td>
				<td>{{ $item['valor'] }}</td>
				<td>
					<form>
						<a class="link-primary" onClick="getContato({{ $item['id'] }})">
							<span title="editar" class="glyphicon glyphicon-edit"><i class="bi bi-pencil"></i></span>
						</a>
					</form>
					<form action="{{ route('contato.delete', ['id' => $item->id]) }}" method="POST">
						{{ csrf_field() }}
						@method('DELETE')
						<button class="link-primary" type="submit">
							<span title="remover" class="glyphicon glyphicon-remove"><i class="bi bi-trash3"></i></span>
						</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif
<div class="modal fade" id="myModal" role="dialog">
	<form class="form-horizontal mt20" action="{{ route('contato.store') }}" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="POST">
		<input type="hidden" name='id_pessoa' value="{{$pessoa->id}}" />
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Contato</h4>
				</div>
				<div class="modal-body">
					<div class='form-group'>
						<label class='col-md-2 control-label'>Descrição</label>
						<div class='col-md-10'>
							<input required class='form-control' name='descricao' />
						</div>
					</div>
					<div class='form-group'>
						<label class='col-lg-2 control-label'>Tipo</label>
						<div class='col-lg-10'>
							<select class='form-control' name='tipo'>
								<option value="" hidden>Selecione..</option>
								<option value="Whatsapp">Whatsapp</option>
								<option value="Telefone">Telefone</option>
								<option value="Email">Email</option>
							</select>
						</div>
					</div>
					<div class='form-group' id="tipo_contato">
						<label class='col-md-2 control-label'>Telefone</label>
						<div class='col-md-10'>
							<input class='form-control' name='valor' />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default">Salvar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@push('scripts')
<script type="module">
	const contatolModal = new bootstrap.Modal('#myModal');
	$("#adicionarContato").click(function(ev) {
		$('#myModal form').trigger("reset");
		$("#myModal [name='tipo']").trigger("change");
		$('#myModal form').attr("action", "{{ route('contato.store') }}");
		$("#myModal [name='_method']").val('POST');
		contatolModal.show();
	});
	$("[data-dismiss='modal']").click(function(ev) {
		contatolModal.hide();
	});
	$("#myModal [name='tipo']").change(function(ev) {
		$("#myModal #tipo_contato input").attr("type", "text");
		Inputmask.remove("#myModal #tipo_contato input");
		let tipo = $("#myModal [name='tipo']").val();
		$("#myModal #tipo_contato label").text(tipo);
		if(tipo == "Email") {
			$("#myModal #tipo_contato input").attr("type", "email");
		} else {
			Inputmask({ "mask": ['(99) 9999-9999', '(99) 99999-9999'] }).mask("#myModal #tipo_contato input");
			$("#myModal #tipo_contato input").attr("type", "tel");
		}
	})
	window.getContato = async (id) => {
		try {
			const response = await axios.get("{{ route('contato.edit') }}", { params: { id } });
			$('#myModal form').trigger("reset");
			let route = "{{ route('contato.update', ['id' => '_|_']) }}";
			$('#myModal form').attr("action", route.replace('_|_', id));
			$("#myModal [name='_method']").val('put');
			$("#myModal [name='descricao']").val(response.data.descricao);
			$("#myModal [name='valor']").val(response.data.valor);
			$("#myModal [name='tipo']").val(response.data.tipo).change();
			contatolModal.show();
		} catch (error) {
			console.error(error);
		}
	}
</script>
@endpush