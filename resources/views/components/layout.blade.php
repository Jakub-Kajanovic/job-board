<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Job Board</title>
</head>
<body class="mx-auto mt-10 max-w-2xl lg:p-0 px-8 bg-gradient-to-r from-violet-200 text-slate-700 ">
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li><a href="{{route('jobs.index')}}">Home</a></li>
        </ul>
        <ul class="flex space-x-2">
            @auth
            <li><a href="{{route('my-job-applications.index')}}">{{auth()->user()->name ?? 'Anonymous'}}: Applications</a></li>
            <li>
                <a href="{{route('my-jobs.index')}}">My Jobs</a>
            </li>
            <li>
                <form action="{{route('auth.destroy')}}" method="POST"> 
                    @csrf
                    @method('DELETE')
                <x-button>Log out</x-button>
                </form>
            </li>
            @else
            <li>
                <a href="{{route('auth.create')}}">Sign In</a>
            </li>
            <li>
                <a href="{{route('register.create')}}">Register</a>
            </li>
            @endauth
        </ul>
    </nav>
    @if(session('success'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
        <p class="font-bold">Success!</p>
        <p>{{session('success')}}</p>
    </div>
    @endif
    @if(session('error'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
        <p class="font-bold">Error!</p>
        <p>{{session('error')}}</p>
    </div>
    @endif
    <main>
    {{$slot}}
    </main>
</body>
</html>