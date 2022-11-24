<div>
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <form wire:submit.prevent="update">
            <div class="mb-4">
                <label for="" class="block">Name</label>
                <input type="text" wire:model.defer="collection.name" class="py-2 px-3 border rounded border-gray-400">
            </div>

            <div class="mb-4">
                <label for="" class="block mb-4 font-bold text-xl">Fields</label>
                <div class="bg-gray-50 border border-collapse border-gray-200">
                    <div class="grid grid-cols-3">
                        <div class="col-span-1 p-2 font-bold">
                            Name
                        </div>
                        <div class="col-span-1 p-2 font-bold">
                            Type
                        </div>
                        <div class="col-span-1 p-2 font-bold">
                            Actions
                        </div>
                    </div>
                </div>
                @forelse($fields as $field)
                    <div class="p-4 border border-collapse border-gray-200 border-t-0">
                        <div class="grid grid-cols-3 items-center">
                            <div class="col-span-1">
                                <input type="text" wire:model.defer="fields.{{ $field['id'] }}.name" class="py-2 px-3 border rounded border-gray-400">
                            </div>
                            <div class="col-span-1">
                                <select wire:model="fields.{{ $field['id'] }}.type" class="py-2 px-3 border rounded border-gray-400">
                                    <option value="">Choose type...</option>
                                    @foreach(\App\Enums\CollectionFieldTypes::cases() as $fieldType)
                                        <option value="{{ $fieldType->value }}">{{ $fieldType->name }}</option>
                                    @endforeach
                                </select>
                                @if($field['type'] == 'collection')
                                    <select wire:model.defer="fields.{{ $field['id'] }}.config.collection" class="py-2 px-3 border rounded border-gray-400">
                                        @foreach($collections as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                                <div>
                                    <input type="checkbox" wire:model.defer="fields.{{ $field['id'] }}.primary" value="1"> Primary?
                                </div>
                                <div>
                                    <input type="checkbox" wire:model.defer="fields.{{ $field['id'] }}.required" value="1"> Required?
                                </div>
                            </div>
                            <div class="col-span-1">
                                <button type="button" wire:click="removeField('{{ $field['id'] }}')" class="text-red-600">Remove</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 border border-collapse border-gray-200 border-t-0">
                        No fields
                    </div>
                @endforelse
                <div class="flex justify-end mt-4">
                    <button type="button" wire:click="addField" class="py-2 px-3 bg-blue-600 text-white rounded">Add Field</button>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-block bg-blue-600 rounded text-white py-3 px-4">Update</button>
            </div>
        </form>
    </div>
</div>
