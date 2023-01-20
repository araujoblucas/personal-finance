@extends('layouts.app')

@section('content')

    <div class="view_area">
        <form action="{{ route("purchase.store") }}" autocomplete="off" method="POST">
            @csrf()
            <div style="display: flex; flex-direction: row">
                <input-component width="150px" title="Referência" name="reference" type="date"
                                 default_value="{{ now()->format('Y-m-d') }}"></input-component>
                <input-component width="400px" title="Descrição" name="description"></input-component>
                <input-component width="100px" title="Preço" name="price"></input-component>
            </div>
            <div style="display: flex; flex-direction: row">
                <input-component width="505px" title="Tags" name="tags"></input-component>
                <switch-input-component :prop_value="true" name="is_paid" title="Pago?"></switch-input-component>

            </div>
            <div style="display: flex; flex-direction: row">
                <input-component width="120px" title="Parcelas" name="number_of_installments" type="number"
                                 required="false"></input-component>
                <input-component width="120px" title="Preço" name="price_of_installments"
                                 required="false"></input-component>
                <input-component width="200px" title="Pago por" name="paid_by"></input-component>
                <button-submit-component width="120px"></button-submit-component>
            </div>
        </form>
    </div>

@endsection
