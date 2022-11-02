<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posting | Find Laravel Jobs</title>

    {{-- links --}}
    {{-- alpine js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    {{-- tailwind css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config ={
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    }
                }
            }
        }
    </script> --}}
</head>
<body class="">
    <nav class="flex justify-content-between items-center mb-4 pt-4">
        <a href="/"><img src="" alt="" class="w-24 logo">GIGS</a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="font-bold uppercase">
                    welcome {{ auth()->user()->name }}
                </span>
            </li>
            <li>
                <a href="/listings/manage" class="hover:text-laravel"><i class="fas fa-gear"></i>Manage Listings</a>
            </li>
            <li class="">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="hover:text-laravel"><i class="fas fa-user-plus"></i>Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>Login</a>
            </li>
            @endauth
        </ul>
    </nav>

    {{-- VIEW OUTPUT --}}
    <main>
        {{ $slot }}
    </main>
    <footer class="relative bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">copyryght &copy; <script>document.write(new Date().getFullYear());</script>, All rights reserved</p>
        <a href="{{ '/listings/create' }}" class="absolute top-10 right-10 bg-black text-white py-2 px-5">Post Jobs</a>
    </footer>

    <x-flash-msg />

</body>
</html>