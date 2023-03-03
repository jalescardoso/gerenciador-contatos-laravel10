@extends('layouts.app')

@section('content')
<div class="container">
	<a type="button" class="btn btn-link" href="{{ route('pessoa.index') }}">Pessoas</a>
	<form class="form-horizontal" ng-submit='ctrl.submitPessoa()'>
		<div class="form-group">
			<label class="control-label col-sm-2">Nome:</label>
			<div class="col-sm-10">
				<input class="form-control" required ng-model="ctrl.data.nome">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Salvar</button>
			</div>
		</div>
	</form>
</div>
@if($pessoa)
<div class="container" ng-if="ctrl.data.id">
	<h2>Contatos</h2>
	<a ng-click="ctrl.novoContato()" class="btn btn-default" role="button">Adicionar</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Descrição</th>
				<th>Tipo de contato</th>
				<th>Valor</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="row in ctrl.data.contatos">
				<td>abc</td>
				<td>terefoni</td>
				<td>(66) 6666-6666</td>
				<td>
					<span ng-click="ctrl.novoContato(row)" title="editar" class="glyphicon glyphicon-edit"></span>&nbsp;
					<span ng-click="ctrl.excluirContato(row.id)" title="remover" class="glyphicon glyphicon-remove"></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endif
<div class="modal fade" id="myModal" role="dialog">
	<form class="form-horizontal mt20" ng-submit='ctrl.submitContato()'>
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
							<input required class='form-control' ng-model='ctrl.contato.descricao' />
						</div>
					</div>
					<div class='form-group'>
						<label class='col-lg-2 control-label'>Tipo</label>
						<div class='col-lg-10'>
							<select class='form-control' ng-model='ctrl.contato.tipo'>
								<option value="" hidden>Selecione..</option>
								<option value="Whatsapp">Whatsapp</option>
								<option value="Telefone">Telefone</option>
								<option value="Email">Email</option>
							</select>
						</div>
					</div>
					<div class='form-group' ng-if="ctrl.contato.tipo != 'Email'">
						<label class='col-md-2 control-label'>Telefone</label>
						<div class='col-md-10'>
							<input required type="tel" class='form-control telefone' ng-model='ctrl.contato.valor' />
						</div>
					</div>
					<div class='form-group' ng-if="ctrl.contato.tipo == 'Email'">
						<label class='col-md-2 control-label'>Email</label>
						<div class='col-md-10'>
							<input required class='form-control' type='email' ng-model='ctrl.contato.valor' />
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
	$(document).ready(function() {
		// $('.telefone').mask('(00) 00000-0000');
	})
	// angular.module('bravi', ['myService'])
	// .controller('Ctrl', function($scope, $http, MS, $sce, $window, $location) {
	//     this.data = {};
	//     this.contato = {};
	//     this.onInit = async () => {
	//         const params = new Proxy(new URLSearchParams(window.location.search), {
	//             get: (searchParams, prop) => searchParams.get(prop),
	//         });
	//         if (params.id) this.data.id = params.id;
	//         let res = await buscaPessoa(this.data.id);
	//         this.data = res.data;
	//         $scope.$digest();
	//     }
	//     var buscaPessoa = (id_pessoa) => {
	//         if (!id_pessoa) return {
	//             data: {}
	//         };
	//         return $http.get(`api/buscaPessoa?id=${id_pessoa}`);
	//     }
	//     this.novoContato = (contato = {}) => {
	//         this.contato = Object.assign({}, contato);
	//         $('#myModal').modal('toggle');
	//     }
	//     this.submitPessoa = async () => {
	//         await MS.actionHandler(handlersubmitPessoa(), {
	//             msgNotf: 'Sucesso!',
	//             selectorLoad: '#myModal'
	//         });
	//         $scope.$digest();
	//     }
	//     let handlersubmitPessoa = async () => {
	//         let res0 = await $http.post(`api/submitPessoa`, this.data);
	//         if (!this.data.id) {
	//             const url = new URL(location.href);
	//             url.searchParams.set('id', res0.data.id);
	//             location.href = url.href;
	//         } else {
	//             let res = await buscaPessoa(this.data.id);
	//             this.data = res.data;
	//         }
	//     }
	//     this.submitContato = async () => {
	//         await MS.actionHandler(handlersubmitContato(), {
	//             msgNotf: 'Sucesso!',
	//             selectorLoad: '#myModal'
	//         });
	//         $scope.$digest();
	//         $('#myModal').modal('toggle');
	//     }
	//     let handlersubmitContato = async () => {
	//         this.contato.id_pessoa = this.data.id;
	//         await $http.post(`api/submitContato`, this.contato);
	//         let res = await buscaPessoa(this.data.id);
	//         this.data = res.data;
	//     }
	//     this.excluirContato = async (id) => {
	//         if (!confirm("Excluir contato?")) return;
	//         await MS.actionHandler(handlerExcluirContato(id), {
	//             msgNotf: 'Sucesso!',
	//             selectorLoad: '#myModal'
	//         });
	//         $scope.$digest();
	//     }
	//     let handlerExcluirContato = async (id) => {
	//         await $http.delete(`api/deleteContato?id=${id}`);
	//         let res = await buscaPessoa(this.data.id);
	//         this.data = res.data;
	//     }
	// })
</script>
@endpush