<div>
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <form wire:submit.prevent="create">
            <div class="mb-4">
                <label for="" class="block">Name</label>
                <input type="text" wire:model.defer="collection.name" class="py-3 px-4 border rounded border-gray-300">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-block bg-blue-600 rounded text-white py-3 px-4">Create</button>
            </div>
        </form>
    </div>
</div>
