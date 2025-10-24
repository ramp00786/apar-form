@props(['field', 'value' => '', 'type' => 'text', 'rows' => 3, 'min' => '', 'max' => '', 'placeholder' => ''])

<span x-data="{ editing: false }" class="inline-block">
    <!-- Display Mode -->
    <span x-show="!editing" class="group inline-block">
        <span class="inline-block min-w-[200px] px-2 py-1 border border-transparent rounded bg-gray-50/50">
            {{ $value ?: '' }}
        </span>
    </span>

    <!-- Edit Mode -->
    <span x-show="editing" class="inline-block">
        <form method="POST" action="{{ route('forms.update-field', ['form' => request()->route('form')]) }}" class="inline-block">
            @csrf
            @method('PATCH')
            <input type="hidden" name="field_name" value="{{ $field }}">
            
            @if($type === 'textarea')
                <textarea 
                    name="field_value" 
                    rows="{{ $rows }}"
                    class="inline-block min-w-[200px] p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                    placeholder="{{ $placeholder }}"
                >{{ $value }}</textarea>
            @elseif($type === 'number')
                <input 
                    type="number" 
                    name="field_value" 
                    value="{{ $value }}"
                    min="{{ $min }}" 
                    max="{{ $max }}"
                    class="inline-block min-w-[200px] p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="{{ $placeholder }}"
                >
            @else
                <input 
                    type="{{ $type }}" 
                    name="field_value" 
                    value="{{ $value }}"
                    class="inline-block min-w-[200px] p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="{{ $placeholder }}"
                >
            @endif
        </form>
    </span>
</span>