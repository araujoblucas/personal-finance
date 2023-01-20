<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div id="app">
    <div class="view_area">
        <form action="{{ route("purchase.update", $purchase->id) }}" autocomplete="off" method="POST">
            @csrf() @method("PUT")
            <div style="display: flex; flex-direction: row">
                <input-component width="150px" title="Referência" name="reference" type="date"
                                 default_value="{{ $purchase->reference }}"></input-component>
                <input-component width="400px" title="Descrição" name="description"
                                 default_value="{{ $purchase->description }}"></input-component>
                <input-component width="100px" title="Preço" name="price"
                                 default_value="{{ $purchase->price }}"></input-component>
            </div>
            <div style="display: flex; flex-direction: row">
                <input-component width="505px" title="Tags" name="tags"
                                 default_value="{{ $purchase->tags }}"></input-component>
                <switch-input-component :prop_value="true" name="is_paid" title="Pago?"
                                        default_value="{{ $purchase->is_paid }}"></switch-input-component>

            </div>
            <div style="display: flex; flex-direction: row">
                <input-component width="120px" title="Parcelas" name="number_of_installments" type="number"
                                 required="false"
                                 default_value="{{ $purchase->number_of_installments }}"></input-component>
                <input-component width="120px" title="Preço" name="price_of_installments"
                                 required="false"
                                 default_value="{{ $purchase->price_of_installments }}"></input-component>
                <input-component width="200px" title="Pago por" name="paid_by"
                                 default_value="{{ $purchase->paid_by }}"></input-component>
                <button-submit-component width="120px" text="Editar"></button-submit-component>
            </div>
        </form>
    </div>
</div>


</body>

<style>

    .view_area {
        width: 700px;
        height: auto;
        display: flex;
        margin: 0 auto;
        flex-direction: column;
    }

    .view_line {
        width: 700px;
        height: auto;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }


</style>
</html>

