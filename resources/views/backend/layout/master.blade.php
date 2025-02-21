<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/backend') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/backend') }}/img/favicon.png">
    <title>
        Argon Dashboard | @yield('title')
    </title>
    @include('backend.layout.inc.style')
</head>

<body class="g-sidenav-show bg-gray-100">
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div class="min-height-100 bg-primary position-absolute w-100"></div>
        @include('backend.layout.inc.sidebar')
    <main class="main-content position-relative border-radius-lg ">

        @include('backend.layout.inc.nav')

        {{-- @include('backend.layout.inc.cards') --}}

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('backend.layout.inc.script')
</body>

</html>
