<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Four Wheel Motors</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="ui container">
    <main>
        <h1>Four Wheel Motors</h1>
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui secondary vertical pointing menu">
                    <a class="item {{ isActive(null) }}" href="{{ url('/') }}">
                        Home
                    </a>
                    <a class="item {{ isActive('car') }}" href="{{ url('/car') }}">
                        Cars
                    </a>
                    <a class="item {{ isActive('manufacturer') }}" href="{{ url('/manufacturer') }}">
                        Manufacturers
                    </a>
                    <a class="item {{ isActive('model') }}" href="{{ url('/model') }}">
                        Models
                    </a>
                    <a class="item {{ isActive('customer') }}" href="{{ url('/customer') }}">
                        Customers
                    </a>
                    <a class="item {{ isActive('representative') }}" href="{{ url('/representative') }}">
                        Representatives
                    </a>
                    <a class="item {{ isActive('sale') }}" href="{{ url('/sale') }}">
                        Sales
                    </a>
                    <a class="item {{ isActive('purchase') }}" href="{{ url('/purchase') }}">
                        Purchases
                    </a>
                </div>
            </div>
            <div class="twelve wide column">
                @yield('content')
            </div>
        </div>
    </main>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>
@yield('scripts')
</body>
</html>