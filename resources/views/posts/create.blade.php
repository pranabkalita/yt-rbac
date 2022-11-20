<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <div class="flex">
                    <a href="{{ route('posts.index') }}"
                        class="px-4 py-2 bg-blue-400 hover:bg-blue-600 rounded text-white">Back</a>
                </div>

                <div class="inline-block min-w-full py-2 align-middle">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="form-group mb-6">
                            <label for="title" class="form-label inline-block mb-2 text-gray-700">Title</label>
                            <input type="text" name="title"
                                class="block w-full px-3 py-2 text-gray-700 border border-solid border-gray-300 rounded">

                            @error('title')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-6">
                            <label for="body" class="form-label inline-block mb-2 text-gray-700">Body</label>
                            <textarea type="text" name="body"
                                class="block w-full px-3 py-2 text-gray-700 border border-solid border-gray-300 rounded">
                            </textarea>

                            @error('body')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="px-4 py-2 bg-blue-400 hover:bg-blue-600 rounded text-white">Create</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
