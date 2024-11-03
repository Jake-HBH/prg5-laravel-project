<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Species') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.species.update', $species) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="species" class="block text-gray-700">Species Name</label>
                    <input type="text" name="species" id="species" value="{{ $species->species }}" required class="border border-gray-300 rounded p-2 w-full">
                </div>
                <x-secondary-button type="submit" class="bg-blue-500 text-white rounded p-2">Update Species</x-secondary-button>
            </form>

        </div>
    </div>
</x-app-layout>
