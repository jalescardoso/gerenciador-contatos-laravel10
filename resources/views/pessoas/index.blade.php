@extends('layouts.app')

@section('content')
<h2>Pessoas </h2>
<a style="float: right;" title="Suporte balanceados" href="{{ route('suportes.index') }}">Suporte balanceados</a>

<a href="{{ route('pessoa.create') }}" title="Adicionar">Adicionar</a>
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
            <td>{{ count($item->contatos) }}</td>
            <td>
                <form>
                    <a class="link-primary" href="{{ route('pessoa.edit', ['id' => $item->id]) }}">
                        <span title="editar" class="glyphicon glyphicon-edit">editar</span>
                    </a>
                </form>
                <form action="{{ route('pessoa.delete', ['id' => $item->id]) }}" method="POST">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button class="link-primary" type="submit">
                        <span title="remover" class="glyphicon glyphicon-remove">remover</span>
                    </button>
                </form>
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