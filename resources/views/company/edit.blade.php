<x-app-layout>
    <form method="POST" action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$company->name" required
                autofocus />
            @error('name')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$company->email" />
            @error('email')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="mt-4">
            <x-label for="logo" :value="__('Logo')" />
            <x-input id="logo" class="block mt-1 w-full" type="file" name="logo" />
            @error('logo')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        @if($company->logo_path)
        <img class="mt-2" src="{{asset('storage/' . $company->logo_path)}}" alt="Company logo" width="100px">
        @endif

        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-4">
                {{ __('Update') }}
            </x-button>
        </div>
    </form>
</x-app-layout>