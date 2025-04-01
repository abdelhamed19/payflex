@php
    $path = '';
    $direction = '';
    if (session('lang') == 'ar')
    {
        $path = 'light-rtl';
        $direction = 'rtl';
    }
    else
    {
        $path = 'light';
    }
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("admin/$path/css/simplebar.css") }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset("admin/$path/css/feather.css") }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset("admin/$path/css/daterangepicker.css") }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset("admin/$path/css/app-light.css") }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset("admin/$path/css/app-dark.css") }}" id="darkTheme" disabled>
</head>

<body class="dark {{ $direction }}" >
    @yield('content')

    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
    <script src="{{ asset("admin/$path/js/jquery.min.js") }}"></script>
    <script src="{{ asset("admin/$path/js/popper.min.js") }}"></script>
    <script src="{{ asset("admin/$path/js/moment.min.js") }}"></script>
    <script src="{{ asset("admin/$path/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("admin/$path/js/simplebar.min.js") }}"></script>
    <script src="{{ asset("admin/$path/js/daterangepicker.js") }}"></script>
    <script src="{{ asset("admin/$path/js/jquery.stickOnScroll.js") }}"></script>
    <script src="{{ asset("admin/$path/js/tinycolor-min.js") }}"></script>
    <script src="{{ asset("admin/$path/js/config.js") }}"></script>
    <script src="{{ asset("admin/$path/js/apps.js") }}"></script>
</body>
</html>
