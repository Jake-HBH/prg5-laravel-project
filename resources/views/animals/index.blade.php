{{-- //de pagina van de aangemaakte dieren --}}
<x-layout>

    <div class="flex flex-col mb-2">
        <x-anchor-link href="{{ route('animals.create') }}" class="font-bold text-blue-900 hover:underline">Add animal
        </x-anchor-link>

        <form action="{{ route('animals.index') }}" method="get" class="mt-4">
            <label for="filter" class="sr-only">Filter</label>
            <select name="filter" id="filter" class="border border-gray-300 rounded p-2">
                <option value="">All animals</option>
                @foreach($species as $specie)
                    <option value="{{ $specie->id }}" {{ ($specie->id == $filteredAnimal) ? 'selected' : '' }}>
                        {{ $specie->species }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="search" placeholder="Search" value="{{ request('search') }}"
                   class="border border-gray-300 rounded p-2 w-full"/>

            <x-secondary-button type="submit" class="ml-2 bg-blue-500 text-white rounded p-2">Filter
            </x-secondary-button>
        </form>
    </div>
    <h2 class="text-xl font-bold mt-6 mb-4">Latest Added Animals</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        @foreach ($latestAnimals as $animal)
            <div class="bg-white rounded shadow-lg overflow-hidden">
                <div class="h-48 w-full relative">
                    <img src="{{ $animal->image_url }}" class="absolute inset-0 w-full h-full object-cover"
                         alt="{{ $animal->name }}">
                </div>
                <div class="p-4">
                    <h5 class="font-semibold text-lg">{{ $animal->name }}</h5>
                    <p class="text-gray-500"><small>{{ $animal->address }}</small> |
                        <small>{{ $animal->created_at->format('d F Y') }}</small></p>
                    <p class="text-gray-500"><small>Species: {{ $animal->species->species ?? 'Unknown' }}</small></p>
                    <p class="text-gray-500"><small>Posted by: {{ $animal->user->name}}</small></p>
                    <x-anchor-link href="{{ route('animals.show', $animal) }}"
                                   class="mt-2 inline-block text-white rounded p-2">View Details
                    </x-anchor-link>
                </div>
            </div>
        @endforeach
    </div>


    <h2 class="text-xl font-bold mt-6 mb-4">All Animals</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($animals as $animal)
            @if($animal->species_id == $filteredAnimal || $filteredAnimal == '')
                <div class="bg-white rounded shadow-lg overflow-hidden">
                    <div class="h-48 w-full relative">
                        <img src="{{ $animal->image_url }}" class="absolute inset-0 w-full h-full object-cover"
                             alt="{{ $animal->name }}">
                    </div>
                    <div class="p-4">
                        <h5 class="font-semibold text-lg">{{ $animal->name }}</h5>
                        <p class="text-gray-500"><small>{{ $animal->address }}</small> |
                            <small>{{ $animal->created_at->format('d F Y') }}</small></p>
                        <p class="text-gray-500"><small>Species: {{ $animal->species->species ?? 'Unknown' }}</small>
                        </p>
                        <p class="text-gray-500"><small>Posted by: {{ $animal->user->name ?? 'Unknown' }}</small></p>
                        <x-anchor-link href="{{ route('animals.show', $animal) }}"
                                       class="mt-2 inline-block text-white rounded p-2">View Details
                        </x-anchor-link>
                    </div>
                </div>
            @endif
        @endforeach
    </div>


</x-layout>
