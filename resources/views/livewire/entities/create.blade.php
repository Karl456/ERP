<div>
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <form wire:submit.prevent="create">
            @foreach($fields as $field)
                <div class="mb-4">
                    <label for="" class="block">{{ $field->name }}</label>
                    <input type="text" wire:model.defer="field_values.{{ $field->handle }}" class="py-3 px-4 border rounded border-gray-300">
                    @error('field_values.' . $field->handle)
                        <span class="block text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
            <div class="flex justify-end">
                <button type="submit" class="inline-block bg-blue-600 rounded text-white py-3 px-4">Create</button>
            </div>
        </form>
    </div>
</div>
