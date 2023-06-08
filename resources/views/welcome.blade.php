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

            <form action="{{ url('/') }}" method="get">
                <div class="row">
                    @foreach($properties as $key => $property)
                        <div class="col-md-2">
                            <select name="{{ $key }}" id="property_{{ $key }}" class="form-select">
                                <option selected disabled>Select {{ $key }}</option>
                                @foreach($property as $option)
                                    <option value="{{ $option->id }}"
                                    @if($option->id == request()->get($key)) selected @endif>
                                        {{ $option->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                    @if(!empty(request()->all()))
                        <div class="col-md-2">
                            <button class="btn btn-secondary" type="button" onclick="clearFilter()">Очистить фильтр</button>
                        </div>
                    @endif
                </div>
            </form>

            <div class="row mt-3">
                @forelse($products as $product)
                    <div class="col-3 mb-4">
                        <div class="card">
                            <img src="https://placehold.co/600x400/EEE/31343C" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">
                                    <strong>Цвета:</strong>
                                    {{ $product->getOptions('color')->pluck('name')->unique()->join(', ') }}
                                    <br>
                                    <strong>Размеры:</strong>
                                    {{ $product->getOptions('size')->pluck('name')->unique()->join(', ') }}
                                    <br>
                                </p>
                                <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p class="text-muted">Ничего не найдено</p>
                    </div>
                @endforelse
            </div>

        </div>

        <div class="text-muted fs-6">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>

        $('select').on('change', function () {
            $(this).closest('form').submit();
        });

        const clearFilter = function(){
            window.location.href = '{{ url('/') }}';
        }


    </script>

</body>
</html>
