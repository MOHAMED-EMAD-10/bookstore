<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    @include('dashboard.layouts.css')

</head>

<body>

    @include('dashboard.layouts.header')

    <div class="d-flex align-items-stretch">

        @include('dashboard.layouts.sidebar')

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">@yield('title')</h2>
                </div>
            </div>
            @yield('content')

            @include('dashboard.layouts.footer')
        </div>
    </div>
    @include('dashboard.layouts.scripts')
</body>

</html>
