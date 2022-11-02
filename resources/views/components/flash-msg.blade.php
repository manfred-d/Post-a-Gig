@if(session()->has('message'))
    <div x-data="{show:true}" x-init="setTimeout(() =>show = false, 3000)" x-show="show" class="fixed top-0 right-2 transform -translate-x-1/2 bg-laravel text-white px-3 py-3">
        <p class="">
            {{ session('message') }}
        </p>
    </div>
@endif