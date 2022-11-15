<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <div class="flex">
                    <a href="{{ route('admin.roles.index') }}"
                        class="px-4 py-2 bg-blue-400 hover:bg-blue-600 rounded text-white">Back</a>
                </div>

                <div class="inline-block min-w-full py-2 align-middle">
                    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-6">
                            <label for="name" class="form-label inline-block mb-2 text-gray-700">Name</label>
                            <input type="text" name="name" value="{{ $role->name }}"
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

        <hr class="border border-solid border-gray-300">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-20">
            <div class="max-w-7xl mx-auto">

                <h2 class="text-2xl underline text-gray-700">Permissions</h2>

                <div class="flex justify-between my-10">
                    <p>Selected Permissions</p>

                    <div>
                        @foreach ($role->permissions as $permission)
                            <span class="py-2 px-2 bg-blue-300 rounded-md">{{ $permission->name }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="inline-block min-w-full py-2 align-middle">
                    <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                        @csrf

                        <div class="form-group mb-6">
                            <label for="name" class="form-label inline-block mb-2 text-gray-700">Permissions
                                List</label>


                            <select multiple name="permissions[]"
                                class="block w-full p-3 border-gray-300 rounded-sm cursor-pointer focus:outline-none">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}" @selected($role->hasPermission($permission->name))>
                                        {{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-400 hover:bg-blue-600 rounded text-white">Assign
                            Permissions</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
