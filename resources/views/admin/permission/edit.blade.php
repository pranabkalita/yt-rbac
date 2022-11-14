<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <div class="flex">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="px-4 py-2 bg-blue-400 hover:bg-blue-600 rounded text-white">Back</a>
                </div>

                <div class="inline-block min-w-full py-2 align-middle">
                    <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-6">
                            <label for="name" class="form-label inline-block mb-2 text-gray-700">Name</label>
                            <input type="text" name="name" value="{{ $permission->name }}"
                                class="block w-full px-3 py-2 text-gray-700 border border-solid border-gray-300 rounded">

                            @error('name')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="px-4 py-2 bg-blue-400 hover:bg-blue-600 rounded text-white">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
