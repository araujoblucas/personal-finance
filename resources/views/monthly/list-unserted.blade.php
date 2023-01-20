@extends('layouts.app')

@section('content')
<div id="table">
    <table>
        <tr>
            <th class="w-40">Descrição</th>
            <th class="w-10">Total</th>
            <th class="w-10">Tags</th>
            <th class="w-15">Pagor por</th>
            <th class="w-20">Último dia adicionado</th>
            <th class="w-5">Config</th>
        </tr>
        @if(! empty($purchases))

            @foreach($purchases as $purchase)
                <tr>
                    <td>{{$purchase->description}}</td>
                    <td>{{$purchase->price}}</td>
                    <td>{{$purchase->tags}}</td>
                    <td>{{$purchase->paid_by}}</td>
                    <td>{{$purchase->last_inserted_date ?? "Não adicionado"}}</td>
                    <td>
                        <div style="display:flex">
                            <a href="{{ route('monthly.edit', $purchase->id) }}">
                                <x-icons.pencil color="#000"/>
                            </a>

                            <form id="{{'delete-form-' . $purchase->id}}"
                                  action="{{ route('monthly.delete', $purchase->id) }}"
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
