<div>
    <select 
        {{$attributes->merge([
            "class" => "mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:shadow-outline-blue focus:shadow-outline transition duration-150 ease-in-out sm:text-sm sm:leading-5"
        ])}}
    autocomplete="off"
    wire:model.{{$liveWireMode}}="{{$fieldName}}"
    wire:loading.attr="disabled"
    >
        <option value=""></option>
        @foreach($options as $k=>$v)
        <option value="{{$k}}" {{$value == $k ? 'selected' : ''}}>{{$v}}</option>
        @endforeach
    </select>
</div>