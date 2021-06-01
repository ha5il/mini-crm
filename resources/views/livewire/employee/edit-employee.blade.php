<div>
    <form wire:submit.prevent="formSubmitted">
        <div class="shadow overflow-hidden sm:rounded-md">
            <h1 class="text-gray-800 font-bold uppercase text-lg bg-gray-200 pl-10 py-5">Employee Info</h1>
            <div class="flex flex-wrap px-4 py-5 bg-white sm:p-6">
                <div class="w-1/3 px-2">
                    <x-input class="block mt-1 w-full" type="text" wire:model.defer="first_name" placeholder="First Name" />
                    @error('first_name')<span class="text-red-600">{{$message}}</span>@enderror
                </div>
                <div class="w-1/3 px-2">
                    <x-input class="block mt-1 w-full" type="text" wire:model.defer="last_name" placeholder="Last Name" />
                    @error('last_name')<span class="text-red-600">{{$message}}</span>@enderror
                </div>
                <div class="w-1/3 px-2">
                    <x-input class="block mt-1 w-full" type="email" wire:model.defer="email" placeholder="Email" />
                    @error('email')<span class="text-red-600">{{$message}}</span>@enderror
                </div>
                <div class="w-1/3 px-2">
                    <x-input class="block mt-1 w-full" type="number" wire:model.defer="phone" placeholder="Phone" />
                    @error('phone')<span class="text-red-600">{{$message}}</span>@enderror
                </div>
                <div class="w-1/3 px-2">
                    <x-form-select fieldName="company_id" :options="$companies" />
                    @error('company_id')<span class="text-red-600">{{$message}}</span>@enderror
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-200 text-right sm:px-6">
                <x-button type="submit">Save</x-button>
            </div>
        </div>
    </form>
</div>
