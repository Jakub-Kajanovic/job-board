<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Sign in to your account</h1>
    <x-card>
        <form action="{{route('auth.store')}}" method="POST">
        @csrf

        <div class="mb-8">
            <x-label for="email" :required="true">Email</x-label>
            <x-text-input type="email" name="email" />
        </div>

        <div class="mb-8">
            <x-label for="password" :required="true" >Password</x-label>
            <x-text-input type="password" name="password" />
        </div>

        <div class="mb-8 flex justify-between text-sm font-medium">
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="remember" class="rounded-sm border border-slate-400 ">
                <label for="remember">Remember me</label>
            </div>

            <div><a href="#" class="text-indigo-600 hover:underline">Forget Password?</a></div>

        </div>
        <x-button class="w-full bg-green-50" type="submit">Login</x-button>
        </form>
    </x-card>
</x-layout>