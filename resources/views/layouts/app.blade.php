<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/animate.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <title>آسان آموز برنامه نویسی</title>
    @livewireStyles
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/app.js')}}"></script>
</head>

<body dir="rtl">

    @livewire('includes.header')

    {{ $slot }}

    @livewire('includes.footer')

    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/js/grid.js"></script>
    <script src="{{asset('js/app,js')}}"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>

<script>
    livewire.on('Alert', function(message,type) {

        Swal.fire({
            position: 'center',
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 1000
        })
    })
</script>

</html>
