@extends('layouts.app')

@section('content')
<div id="table">
    <table>
        <tr>
            <th class="w-40">Descrição</th>
            <th class="w-10">Valor anterior</th>
            <th class="w-10">Tags</th>
            <th class="w-15">Pagor por</th>
            <th class="w-25">Último dia adicionado</th>

        </tr>
        @if(! empty($pending_purchases))

            @foreach($pending_purchases as $purchase)
                <tr>
                    <td>{{$purchase->description}}</td>
                    <td>{{$purchase->old_price  ?? "Sem precedentes"}}</td>
                    <td>{{$purchase->tags}}</td>
                    <td>{{$purchase->paid_by}}</td>


                        <td>
                            <form action="{{route('purchase.store-by-pending', $purchase->id)}}" method="POST">
                                @method("POST")
                            <input type="text" name="price" title="price">
                            <input type="submit" value="Cadastrar">
                            </form>
                        </td>

                </tr>
            @endforeach
    </table>
    @else
        </table>
    <p>Sem registros!</p>
    @endif


</div>


@endsection
