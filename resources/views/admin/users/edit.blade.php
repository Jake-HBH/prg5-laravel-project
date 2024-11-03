<x-layout>
    <x-slot:heading>
        Edit User - {{ $user->name }}
    </x-slot:heading>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <x-input-label for="name">Name</x-input-label>
            <x-text-input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required />
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <x-input-label for="email">Email</x-input-label>
            <x-text-input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required />
            @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-6">
            <x-anchor-link href="{{ route('admin.users.index') }}">Cancel</x-anchor-link>
            <x-primary-button type="submit">Save Changes</x-primary-button>
        </div>
    </form>
</x-layout>
