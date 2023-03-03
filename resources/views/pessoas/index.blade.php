@extends('layouts.app')

@section('content')
<h2>Pessoas <a style="float: right;" type="button" class="btn btn-link" href="{{ route('suportes.index') }}">Suporte balanceados</a></h2>
<a href="{{ route('pessoa.create') }}" class="btn btn-default" role="button">Adicionar</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th style="width:70%">nome</th>
            <th>Qnt contatos</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pessoas as $item)
        <tr>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['nome'] }}</td>
            <td>n implmentado</td>
            <td>
                <a href="{{ route('pessoa.edit', ['id' => $item->id]) }}">
                    <span title="editar" class="glyphicon glyphicon-edit">a</span>
                </a> &nbsp;
                <span ng-click="ctrl.excluirPessoa(row.id)" title="remover" class="glyphicon glyphicon-remove"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@push('scripts')
<script type="module">
    $(document).ready(function() {

    })
    // angular.module('bravi', ['myService'])
    // 		.controller('Ctrl', function($scope, $http, MS, $sce, $window) {
    // 			this.list = [];
    // 			this.onInit = async () => {
    // 				let res = await buscaPessoas();
    // 				this.list = res.data;
    // 				$scope.$digest();

    // 			}
    // 			var buscaPessoas = () => {
    // 				return $http.get(`api/buscaPessoas`);
    // 			}
    // 			this.excluirPessoa = async (id) => {
    // 				if (!confirm("Excluir pessoa?")) return;
    // 				await MS.actionHandler(handlerExcluir(id), {
    // 					msgNotf: 'Sucesso!',
    // 				});
    // 				$scope.$digest();
    // 			}
    // 			let handlerExcluir = async (id) => {
    // 				await $http.delete(`api/deletePessoa?id=${id}`);
    // 				let res = await buscaPessoas();
    // 				this.list = res.data;
    // 			}
    // 		})
</script>
@endpush