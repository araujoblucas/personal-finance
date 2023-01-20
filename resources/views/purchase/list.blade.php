@extends('layouts.app')

@section('content')

    <div id="table">
        <form method="get" action="{{route('purchase.list')}}">
            <input type="month" name="month-year">
            <button type="text" type="submit">Nessa data</button>
        </form>
        <table>
            <tr>
                <th class="w-5">Referencia</th>
                <th class="w-30">Descrição</th>
                <th class="w-5">Nº de Parcelas</th>
                <th class="w-10">Pagor por</th>
                <th class="w-5">Parcela</th>
                <th class="w-5">Total</th>
                <th class="w-5">Fixa</th>
                <th class="w-20">Tags</th>
                <th class="w-10">Pago</th>
                <th class="w-5">Config</th>
            </tr>
            @if(! empty($purchases))

                @foreach($purchases as $purchase)
                    <tr>
                        <td>@formatDate($purchase->reference)</td>
                        <td>{{$purchase->description}}</td>
                        <td>{{$purchase->number_of_installments ? ($purchase->actual_installment . '/' . $purchase->number_of_installments) : ''}}</td>
                        <td>{{$purchase->paid_by}}</td>
                        <td>{{$purchase->price_of_installments}}</td>
                        <td>{{$purchase->price}}</td>
                        <td>{{$purchase->is_monthly}}</td>
                        <td>{{$purchase->tags}}</td>
                        <td>
                            {!! $purchase->is_paid ? "Pago" : "<a href='" . route('pay', $purchase->id) ."'>Pagar</a>" !!}
                        </td>
                        <td>
                            <div style="display:flex;">
                                <a href="{{ route('purchase.edit', $purchase->id) }}">
                                    <x-icons.pencil color="#000"/>
                                </a>

                                <form id="{{'delete-form-' . $purchase->id}}"
                                      action="{{ route('purchase.delete', $purchase->id) }}"
                                      method="POST" class="hidden">
                                    @csrf @method('DELETE')
                                    <a href="#"
                                       onclick="document.getElementById('{{'delete-form-' . $purchase->id}}').submit();">
                                        <x-icons.minus-circle color="#000"/>
                                    </a>
                                </form>


                            </div>
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
