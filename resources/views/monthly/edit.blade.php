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
<div id="app">


    <div class="view_area">
        <form action="{{ route("monthly.store") }}" autocomplete="off" method="POST">
            @csrf()
            <div style="display: flex; flex-direction: row">
                <input-component width="500px" title="Descrição" name="description"
                                 default_value="{{ $monthly['description'] }}">
                </input-component>

                <input-component width="150px" title="Preço" name="price" step="any" type="number"
                                 default_value="{{ $monthly['price'] }}">
                </input-component>
            </div>
            <div style=" display: flex; flex-direction: row">
                <input-component width="455px" title="Tags" name="tags"
                                 default_value="{{ $monthly['tags'] }}">

                </input-component>

                <input-component width="200px" title="Último dia adicionado" name="last_inserted_date" type="date"
                                 default_value="{{ $monthly['last_inserted_date'] ?? "Nunca adicionado" }}">
                </input-component>

            </div>
            <div style="display: flex; flex-direction: row">
                <input-component width="150px" title="Data de inicio" name="start_date" type="date"
                                 default_value="{{ $monthly['start_date'] }}">
                </input-component>

                <input-component width="200px" title="Pago por" name="paid_by"
                                 default_value="{{ $monthly['paid_by'] }}">
                </input-component>

                <switch-input-component :prop_value="true" name="same_price" title="Mesmo Preço?"
                                        default_value="{{ $monthly['same_price'] }}">
                </switch-input-component>

                <button-submit-component width="120px"></button-submit-component>
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

