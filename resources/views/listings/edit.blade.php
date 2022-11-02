<x-layout>
    <x-card class="p-10 w-50 mt-24 m-auto">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit a Gig</h2>
            <p class="mb-4">Edit:<b> {{ $listing->title }} </b></p>
        </header>
        <form action="/listings/{{ $listing->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="company" class=" inline-block text-lg mb-2">Company Name</label>
                <input type="text" name="company" id="" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->company }}" placeholder="Company name">

                @error('company')
                    <p class="text-red-700 text-xs mt-1"> {{ $message }}</p>
                @enderror 
            </div>
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Job Title</label>
                <input type="text" name="title" id="" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->title }}" placeholder="Example: Laravel Dev">
                
                @error('title')
                    <p class="text-red-700 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                <input type="text" name="location" id="" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->location }}" placeholder="Example: Remote, Nairobi">

                @error('location')
                    <p class="text-red-700 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" name="email" id="" class="border border-gray-200 rounded p-2 w-full" value="{{ $listing->email }}" placeholder="Example: Remote, Nairobi">

                @error('email')
                    <p class="text-red-700 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website/Application URL</label>
                <input type="text" name="website" id="" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->website }}" placeholder="Example:www.example.com">

                @error('website')
                    <p class="text-red-700 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags(separated by comma)</label>
                <input type="text" name="tags" id="" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->tags }}" placeholder="Laravel, vue ">

                @error('tags')
                    <p class="text-red-700 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">Company Logo</label>
                <input type="file" name="logo" id="" class="border border-gray-200 rounded p-2 w-full">

                <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}" alt="" class="w-48 mr-6 mb-6 mt-2">

                @error('logo')
                    <p class="text-red-700 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Job Description</label>
                <textarea name="description" id="" cols="10" rows="4" class="w-full border border-gray-200 rounded p-2 resize-none">
                    {{$listing->description }}
                </textarea>

                @error('description')
                    <p class="text-red-700 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 w-full">
                <button type="submit" class=" border w-3/4 border-gray-200 rounded p-2 bg-success d-inline-block mt-3">Update a Gig</button>
                <button type="reset" class=" border w-1/4 border-gray-200 rounded p-2 bg-success d-inline-block mt-3"><a href="/"> Cancel</a></button>
            </div>
        </form>

    </x-card>
</x-layout>