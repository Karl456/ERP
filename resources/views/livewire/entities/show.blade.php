<div>
    <div class="p-6 bg-white rounded-lg shadow-lg">
        @foreach($entity->collection->fields as $field)
            <div>{{ $field->name }}: {{ $entity->field_values->{$field->handle} }}</div>
        @endforeach
    </div>
</div>
