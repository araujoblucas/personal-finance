@extends('layouts.app')

@section('content')

    <div class="view_area">
        <form action="{{ route("monthly.store") }}" autocomplete="off" method="POST">
            @csrf()
            <div style="display: flex; flex-direction: row">
                <input-component width="500px" title="Descrição" name="description"></input-component>
                <input-component width="150px" title="Preço" name="price" step="any" type="number"></input-component>
            </div>
            <div style="display: flex; flex-direction: row">
                <input-component width="505px" title="Tags" name="tags"></input-component>
                <switch-input-component :prop_value="true" name="is_paid" title="Pago?"></switch-input-component>

            </div>
            <div style="display: flex; flex-direction: row">
                <input-component width="150px" title="Data de inicio" name="start_date" type="date"
                                 default_value="{{ now()->format('Y-m-d') }}"></input-component>
                <input-component width="200px" title="Pago por" name="paid_by"></input-component>
                <switch-input-component :prop_value="true" name="same_price"
                                        title="Mesmo Preço?"></switch-input-component>
                <button-submit-component width="120px"></button-submit-component>
            </div>
        </form>
    </div>



@endsection
