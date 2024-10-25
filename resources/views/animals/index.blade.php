{{-- //de pagina van de aangemaakte dieren --}}

<x-layout>

    <form action="{{ route('animals.index') }}" method="get" class="mb-4">
        <label for="filter" class="sr-only">Filter</label>
        <select name="filter" id="filter" class="border border-gray-300 rounded p-2">
            <option value="">All animals</option>
            @foreach($species as $specie)
                <option
                    value="{{ $specie->species }}" {{ ($specie->species == $filteredAnimal) ? 'selected' : ''}}>{{ $specie->species }}</option>
            @endforeach
        </select>
        <button type="submit" class="ml-2 bg-blue-500 text-white rounded p-2">Filter</button>
    </form>

    <a href="{{ route('animals.create') }}" class="font-bold text-blue-900 hover:underline">Add animal</a>

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
                    <p class="text-gray-500"><strong><small>{{ $animal->address }}
                        </strong>{{ $animal->created_at->format('d F Y') }}</small></p>
                    <a href="{{ route('animals.show', $animal) }}"
                       class="mt-2 inline-block bg-blue-500 text-white rounded p-2">View Details</a>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="text-xl font-bold mt-6 mb-4">All Animals</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($animals as $animal)
            @if($animal->species == $filteredAnimal || $filteredAnimal == '')
                <div class="bg-white rounded shadow-lg overflow-hidden">
                    <div class="h-48 w-full relative">
                        <img src="{{ $animal->image_url }}" class="absolute inset-0 w-full h-full object-cover"
                             alt="{{ $animal->name }}">
                    </div>
                    <div class="p-4">
                        <h5 class="font-semibold text-lg">{{ $animal->name }}</h5>
                        <p class="text-gray-500"><strong><small>{{ $animal->address }}
                            </strong>{{ $animal->created_at->format('d F Y') }}</small></p>
                        <a href="{{ route('animals.show', $animal) }}"
                           class="mt-2 inline-block bg-blue-500 text-white rounded p-2">View Details</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

</x-layout>
