<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Exo 2', sans-serif;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="mt-5 mb-3">

        <div class="row mt-3">
            <div class="col">

                <p><a href="{{ url('/') }}">Назад к списку</a></p>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <img src="https://placehold.co/600x400/EEE/31343C" class="card-img-top" alt="...">
                            </div>
                            <div class="col-4">
                                <h5 class="card-title">{{ $product->name }}</h5>

                                <form action="" method="get">
                                    <div class="my-3">
                                        <select name="color"
                                                id="property_color"
                                                class="form-select" required>
                                            <option selected disabled>Цвет не выбран</option>
                                            @foreach($product->getOptions('color')->unique() as $option)
                                                <option value="{{ $option->id }}"
                                                        @if($option->id == request()->get('color')) selected @endif
                                                >
                                                    {{ $option->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="my-3">
                                        <select name="size"
                                                id="property_size"
                                                class="form-select" required>
                                            <option selected disabled>Размер не выбран</option>
                                            @foreach($product->getOptions('size')->unique() as $option)
                                                <option value="{{ $option->id }}"
                                                        @if($option->id == request()->get('size')) selected @endif
                                                >
                                                    {{ $option->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Узнать цену</button>

                                </form>

                                <hr>

                                @if($offer)
                                    @if($offer != 'empty')
                                        <p class="card-text">
                                            <strong>Артикул:</strong> {{ $offer->code }}
                                        </p>

                                        <p class="card-text">
                                            <strong>Цена:</strong> {{ $offer->price_human }} руб.
                                        </p>

                                        <p class="card-text">
                                            <strong>Остаток на складе:</strong> {{ $offer->quantity }} шт.
                                        </p>
                                    @else
                                        <p class="card-text">
                                            Такого цвета с таким размером нет на складе
                                        </p>
                                    @endif
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="text-muted fs-6">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>

</div>

</body>
</html>
