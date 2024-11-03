{{--1 aangemaakte dier--}}

<x-layout>

    <header class="justify-items-start max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-bold tracking-tight text-gray-900 mb-2">{{ $animal->name }}</h1>
        <hr class="border-gray-300 mb-4">
    </header>

    <div class="bg-gray-200 p-6 rounded-lg shadow-lg mb-6">
        @if($animal->image_url)
            <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}"
                 class="w-full max-w-lg mb-4 rounded-lg shadow-lg">
        @else
            <p class="text-gray-500 mb-4">No image available</p>
        @endif
        <h3 class="text-2xl font-semibold text-gray-800 mb-1">Species: <span
                class="font-normal text-gray-600">{{ $animal->species->species}}</span></h3>
        <h3 class="text-2xl font-semibold text-gray-800 mb-1">Age: <span
                class="font-normal text-gray-600">{{ $animal->age }}</span></h3>
        <h3 class="text-2xl font-semibold text-gray-800 mb-1">Gender: <span
                class="font-normal text-gray-600">{{ $animal->gender }}</span></h3>
        <p class="text-lg text-gray-700 mb-4">Description: <span
                class="font-normal text-gray-600">{{ $animal->description }}</span></p>
        <h3 class="text-2xl font-semibold text-gray-800 mb-1">Address: <span
                class="font-normal text-gray-600">{{ $animal->address }}</span></h3>
        <h3 class="text-2xl font-semibold text-gray-800 mb-1">Posted by: <span
                class="font-normal text-gray-600">{{ $animal->user->name }}</span></h3>
    </div>

    <div class="flex flex-row mt-6 justify-between">
        <a href="{{ route('animals.index') }}"
           class="font-bold text-blue-700 hover:underline transition duration-200 ease-in-out mr-4">
            Back to pet overview
        </a>

        {{--    alleen de delete knop laten zien voor de user waarmee de user id matcht--}}
        {{--    wanneer op submit word gedrukt krijg je nog een confirmation of je dat echt wilt--}}
        @if($animal->user_id === Auth::id())
            <div class="flex flex-row mt-4">
                <a href="{{ route('animals.edit', $animal) }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    Edit Animal
                </a>
                <form action="{{ route('animals.destroy', $animal) }}" method="post" class="ml-4"
                      onsubmit="return confirm('Are you sure you want to delete this adoption post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        Remove post
                    </button>
                </form>
            </div>
        @endif
    </div>
</x-layout>
