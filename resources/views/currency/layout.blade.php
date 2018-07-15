
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
              integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" 
              crossorigin="anonymous">
        <style>
            .currency-info {
                padding: 10px;
            }
            .currency-form {
                margin: 0 auto;
                width: 50%;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light bg-light col-sm-12">
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('currencies-list') }}">Currencies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('currencies-create') }}">Add</a>
                        </li>
                    </ul>
            
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @section('content')

                    @show
                </div>
            </div>
    </body>
</html>
