<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Register your account</h1>
    <x-card>
        <form action="{{route('register.store')}}" method="POST">
        @csrf

        <div class="mb-8">
            <x-label for="name" :required="true">Full Name</x-label>
            <x-text-input type="text" name="name" />
        </div>

        <div class="mb-8">
            <x-label for="email" :required="true">Email</x-label>
            <x-text-input type="email" name="email" />
        </div>

        <div class="mb-8">
            <x-label for="password" :required="true" >Password</x-label>
            <x-text-input type="password" name="password" />
        </div>

        <div class="mb-8">
            <x-label for="password" :required="true" >Confirm password</x-label>
            <x-text-input type="password" name="password_confirmation" />
        </div>

        <x-button class="w-full bg-green-50" type="submit">Register</x-button>
        </form>
    </x-card>
</x-layout>