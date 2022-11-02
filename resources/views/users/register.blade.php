<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24 w-50 col-lg-4">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
            <p class="mb-4">Create account to post a gig</p>
        </header>
        <form action="/users" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="inline-block text-lg mb-2">Name :</label>
                <input type="text" class="border border-gray-200 rounded-lg p-2 w-full" name="name" value="{{ old('name') }}">

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="mb-4">
                <label for="email" class="inline-block text-lg mb-2">Email :</label>
                <input type="email" class="border border-gray-200 rounded-lg p-2 w-full" name="email" value="{{ old('email') }}">

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>
            {{-- <div class="mb-3">
                <label for="username" class="inline-block text-lg mb-2">Username :</label>
                <input type="text" class="border border-gray-200 rounded-lg p-2 w-full name="username" ">

                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div> --}}
            <div class="mb-4">
                <label for="password" class="inline-block text-lg mb-2">Password :</label>
                <input type="password" class="border border-gray-200 rounded-lg p-2 w-full" name="password" value="{{ old('password') }}">

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class=" mb-4">
                <label for="password2" class="inline-block text-lg mb-2">Confirm Password :</label>
                <input type="password" class="border border-gray-200 rounded-lg p-2 w-full" name="password_confirmation" value="{{ old('password_confirmation') }}">

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="my-4">
                <button type="submit" class="bg-laravel text-black rounded-xl w-full py-2 px-4 hover:bg-black">Sign Up</button>
            </div>
            <div class="my-4">
                <p class="">Already have an account
                    <a href="/login" class=" text-danger">Login Here</a>
                </p>
            </div>


        </form>
    </x-card>
</x-layout>