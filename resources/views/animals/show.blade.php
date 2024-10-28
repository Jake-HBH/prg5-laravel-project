{{--1 aangemaakte dier--}}

<x-layout>
    <x-slot:heading>
        {{ $animal->name }}
    </x-slot:heading>

    @if($animal->image_url)
        <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" width="700">
    @else
        <p>No image available</p>
    @endif

    <h3>Species: {{ $animal->species }}</h3>
    <h3>Age: {{ $animal->age }}</h3>
    <h3>Gender: {{ $animal->gender }}</h3>
    <p>Description: {{ $animal->description }}</p>
    <h3>Address: {{ $animal->address }}</h3>

    <div class="flex flex-row">
        <a href="{{ route('animals.index') }}" class="font-bold text-blue-900 hover:underline">
            Back to pet overview
        </a>

        {{--    alleen de delete knop laten zien voor de user waarmee de user id matcht--}}
        {{--    wanneer op submit word gedrukt krijg je nog een confirmation of je dat echt wilt--}}
        @if($animal->user_id === Auth::id())
            <form action="{{ route('animals.destroy', $animal) }}" method="post"
                  onsubmit="return confirm('Are you sure you want to delete this adoption post?');">
                @csrf
                @method('DELETE')
                <x-primary-button type="submit"
                        class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Remove post
                </x-primary-button>
            </form>
        @endif
    </div>
</x-layout>
