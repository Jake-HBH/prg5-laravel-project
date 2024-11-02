<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Animals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-6 text-2xl font-semibold">Animal List</h3>

                    <div class="mb-6">
                        <x-anchor-link href="{{ route('admin.animals.create') }}"
                                       class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            + Add New Animal
                        </x-anchor-link>
                    </div>

                    <table class="w-full border-collapse">
                        <thead>
                        <tr class="text-left border-b border-gray-300">
                            <th class="px-4 py-2 text-sm font-medium">Name</th>
                            <th class="px-4 py-2 text-sm font-medium">Species</th>
                            <th class="px-4 py-2 text-sm font-medium">Publish Status</th>
                            <th class="px-4 py-2 text-sm font-medium">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($animals as $animal)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-3 text-sm">{{ $animal->name }}</td>
                                <td class="px-4 py-3 text-sm"><small>Species: {{ $animal->species->species ?? 'Unknown' }}</small></td>

{{--publish--}}
                                <td class="px-4 py-3 text-sm">
                                    <form action="{{ $animal->published
                    ? route('admin.animals.unpublish', $animal)
                    : route('admin.animals.publish', $animal) }}"
                                          method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="{{ $animal->published ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-green-500 hover:bg-green-600' }} text-white">
                                            {{ $animal->published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                </td>

                                <td class="px-4 py-3 text-sm space-x-2">
                                    <x-anchor-link href="{{ route('admin.animals.edit', $animal) }}"
                                                   class="text-blue-500 hover:text-blue-600">Edit
                                    </x-anchor-link>

                                    <form action="{{ route('admin.animals.destroy', $animal) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit" class="bg-red-500 hover:bg-red-600 text-white">
                                            Delete
                                        </x-primary-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
