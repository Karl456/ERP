<div>
    <div class="flex justify-end mb-4">
        <a href="{{ route('collections.create') }}" class="inline-block bg-blue-600 rounded text-white py-3 px-4">Create Collection</a>
    </div>
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <table class="w-full border border-gray-300 rounded">
            <thead>
                <tr class="bg-gray-50">
                    <td class="py-2 px-3 border border-gray-300">Name</td>
                    <td class="py-2 px-3 border border-gray-300">Actions</td>
                </tr>
            </thead>
            <tbody>
                @forelse($collections as $collection)
                    <tr>
                        <td class="py-2 px-3 border border-gray-300">{{ $collection->name }}</td>
                        <td class="py-2 px-3 border border-gray-300">
                            <a href="{{ route('collections.edit', $collection->handle) }}">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No collections</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
