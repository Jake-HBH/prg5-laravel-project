<x-layout>
    <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <table
            class="min-w-full border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">ID</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Name</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Email</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Status</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Posts</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($users as $user)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->id }}</td>
                    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->name }}</td>
                    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        <span class="{{ $user->status ? 'text-green-600' : 'text-red-600' }} font-semibold">
                            {{ $user->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->animals_count }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this user?');">
                                Delete
                            </button>
                        </form>

                        @if ($user->status)
                            <form action="{{ route('admin.users.deactivate', $user) }}" method="post" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-orange-600 hover:underline" onclick="return confirm('Are you sure you want to deactivate this user?');">
                                    Deactivate
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.users.activate', $user) }}" method="post" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-green-600 hover:underline" onclick="return confirm('Are you sure you want to activate this user?');">
                                    Activate
                                </button>
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
