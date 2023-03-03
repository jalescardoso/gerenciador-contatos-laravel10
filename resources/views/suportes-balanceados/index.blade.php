@extends('layouts.app')

@section('content')
<div class="container">
    <a type="button" class="btn btn-link" href="/">Pessoas</a>
    <h2>Verificação de suporte balanceado</h2>
    <form class="form-horizontal" action="{{ route('suportes.check') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">String</label>
            <input class="form-control" required name="stringSuporte" value={{$stringSuporte ?? ''}}>
        </div>
        <button type="submit" class="btn btn-default">Verificar</button>
        @if($valido === true)
        <p style="color: green">{{$message ?? ''}}</p>
        @elseif($valido === false)
        <p style="color: red">{{$message ?? ''}}</p>
        @endif
    </form>
</div>
@endsection

@push('scripts')
<script type="module">
    $(document).ready(function() {

    })
</script>
@endpush