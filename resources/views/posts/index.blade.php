<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                @can('create', App\Models\Post::class)
                    <div class="flex justify-end">
                        <a href="{{ route('posts.create') }}"
                            class="px-4 py-2 bg-blue-400 hover:bg-blue-600 rounded text-white">New Post</a>
                    </div>
                @endcan

                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        #</th>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                                        Title</th>

                                    <th scope="col"
                                        class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">
                                            {{ $loop->index + 1 }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $post->title }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm">
                                            <div class="flex">
                                                @can('update', $post)
                                                    <a href="{{ route('posts.edit', $post->id) }}"
                                                        class="text-indigo-700 underline mr-5">Edit</a>
                                                @endcan

                                                @can('delete', $post)
                                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}"
                                                        onsubmit="return confirm('Are you sure ?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="text-red-700 underline">Delete</button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
