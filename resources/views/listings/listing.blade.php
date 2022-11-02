<x-layout>

{{-- @include('partials._hero') --}}
@include('partials._search')

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa fa-solid fa-arrow-left"></i>Back</a>
    <div class="mx-4 ">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}" alt="" class="w-48 mr-6 mb-6">
                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <x-tags :tagsCsv="$listing->tags" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot">{{ $listing->location }}</i>
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div class="p-4">
                    <h3 class="text-3xl font-bold mb-4">Description</h3>
                    <div class="text-lg space-y-6 mx-6">
                        <p>{{ $listing->description }}</p>

                        <a href="mailto:{{ $listing->email }}" class="inline-block bg-laravel text-white mt-4 py-2 rounded-xl w-full hover:opacity-80"><i class="fa-solid"></i> Contact Employer</a>
                        
                        <a href="{{ $listing->website }}" class="inline-block bg-black text-white mt-4 py-2 rounded-xl w-full hover:opacity-80">Visit Website</a>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class="mt-4 p-1 flex space-x-6">
            <a href="/listings/{{ $listing->id }}/edit" class="border px-3 inline-block"><i class="fa-solid fa fa-pencil"></i> Edit</a>

            <form method="POST" action="/listings/{{ $listing->id }}">
                @csrf
                @method('DELETE')
                <button class=" text-red-500 btn btn-primary"><i class="fa fa-trash">Delete</i></button>
            </form>

        </x-card>
    </div>
</x-layout>