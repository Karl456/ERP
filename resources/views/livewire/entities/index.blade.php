<div>
    <div class="flex justify-end mb-4">
        <a href="{{ route('entities.create', $collection->handle) }}" class="inline-block bg-blue-600 rounded text-white py-3 px-4">Create {{ \Illuminate\Support\Str::singular($collection->name) }}</a>
    </div>
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <div class="bg-gray-50 border border-collapse border-gray-200">
            <div class="grid grid-cols-{{ $collection->keyFields->count() }}">
                @foreach($collection->keyFields as $keyfield)
                    <div class="col-span-1 p-2 font-bold">
                        {{ $keyfield->name }}
                    </div>
                @endforeach
            </div>
        </div>

        @forelse($collection->entities as $entity)
            <div class="p-4 border border-collapse border-gray-200 border-t-0">
                <div class="grid grid-cols-{{ $collection->keyFields->count() }}">
                    @foreach($collection->keyFields as $keyfield)
                        <div class="col-span-1 cursor-pointer" onclick="window.location = '{{ route('entities.show', [$entity->collection->handle, $entity->id]) }}'">
                            {{ $entity->field_values->{$keyfield->handle} ?? null }}
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="p-4 border border-collapse border-gray-200 border-t-0">
                <div class="grid grid-cols-{{ $collection->keyFields->count() }}">
                    No {{ $collection->name }}
                </div>
            </div>
        @endforelse
    </div>
</div>
