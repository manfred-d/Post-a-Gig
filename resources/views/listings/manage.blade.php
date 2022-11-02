<x-layout>
    <x-card class="p-10 col-lg-8 m-auto">
        <header class="mb-2">
            <h2 class="text-3xl text-center font-bold my-6 uppercase">
                Manage gigs
            </h2>
        </header>
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($listings->isEmpty())
                    @foreach ($listings as $listing )
                    <tr class="border-gray-300 d-flex justify-content-between">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="" class="">{{ $listing->title }}</a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="/listings/{{ $listing->id }}/edit" class=" text-blue-900 px-6 py-2 rounded-xl"><i class="fas fa-solid fa-pen-to-square"></i> Edit</a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <form action="/listings/{{ $listing->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500"><i class="fa-solid fa-trash-can"></i> Delete</button></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-6 border-t border-b order-gray-300 text-lg">
                            <p class="text-center">No Listings found</p>
                        </td>
                    </tr>                    
                @endunless
                
            </tbody>
        </table>
    </x-card>
</x-layout>