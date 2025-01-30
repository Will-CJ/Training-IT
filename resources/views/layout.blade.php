<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="ASLT 2025">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets/logo/logo_frame.png') }}"> {{-- Logo icon --}}
    <link rel="stylesheet" href="{{ asset('font.css') }}">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>

    {{-- Sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Alpine js --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    <!-- TW Elements styles-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        crossorigin="anonymous" />

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- flaticon --}}
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            AOS.init();
        });
    </script>
    {{-- <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    primary: ['Holen', 'sans-serif'],
                    secondary: ['Advera', 'serif']
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script> --}}

    <title>{{ $title }}</title>

    {{-- <style>
        @font-face {
            font-family: 'Advera';
            src: url('/assets/font/Advera.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Holen';
            src: url('/assets/font/Holen.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }
        ::-webkit-scrollbar {
            width: 9px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(360deg, #e76020, #ee892f, transparent);
            border-radius: 30px;
        }

        ::-webkit-scrollbar-track {
            background: linear-gradient(360deg, #325434, #6e896a, transparent);
        }

        html {
            scroll-behavior: smooth;
        }

        .swal2-confirm {
            background: #589981 !important;
        }

        .swal2-deny,
        .swal2-cancel {
            background: #cd6d00 !important;
        }

        .disableScroll {
            overflow: hidden;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style> --}}
    @yield('style')
</head>

<body>
    <div class="">
        @yield('content')
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- 
    <script>
        function getRandomPercent() {
            return Math.floor(Math.random() * 101);
        }

        const container = document.querySelector('.gradient-container');
        const gradient = `
    radial-gradient(at ${getRandomPercent()}% ${getRandomPercent()}%, #e76020 0px, transparent 50%),
    radial-gradient(at ${getRandomPercent()}% ${getRandomPercent()}%, #ee892f 0px, transparent 50%),
    radial-gradient(at ${getRandomPercent()}% ${getRandomPercent()}%, #e0bb76 0px, transparent 50%),
    radial-gradient(at ${getRandomPercent()}% ${getRandomPercent()}%, #6e896a 0px, transparent 50%),
    radial-gradient(at ${getRandomPercent()}% ${getRandomPercent()}%, #325434 0px, transparent 50%),
    radial-gradient(at ${getRandomPercent()}% ${getRandomPercent()}%, #6a5fc2 0px, transparent 50%),
    radial-gradient(at ${getRandomPercent()}% ${getRandomPercent()}%, #0f0f0d 0px, transparent 50%)`;

        container.style.background = gradient;
    </script> --}}

    @yield('script')
</body>

</html>