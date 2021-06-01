<div>
    <div class="flex flex-wrap mb-2">
        <div class="sm:w-1/2 md:w-1/4 px-1">
            <x-button>
                <a href="{{route('employee.edit', 'new')}}">{{__('text.add_employee')}}</a>
            </x-button>
        </div>
        <div class="sm:w-1/2 md:w-1/4 px-1">
            <x-input class="block mt-1 w-full" type="text" wire:model.debounce.500ms="search" placeholder="Search" />
        </div>
    </div>

    <div wire:loading.class="opacity-50" class="flex flex-col">
        <div class="my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <x-table :headings="[trans('text.employee'), trans('text.company'), trans('text.email'), trans('text.phone'), trans('text.registered'), '']">
                    @forelse ($employees as $employee)
                    <x-table-row>
                        <x-table-cell>{{$employee->full_name}}</x-table-cell>
                        <x-table-cell>{{$employee->company->name}}</x-table-cell>
                        <x-table-cell>{{$employee->email}}</x-table-cell>
                        <x-table-cell>{{$employee->phone}}</x-table-cell>
                        <x-table-cell>{{$employee->registered_at}}</x-table-cell>
                        <x-table-cell>
                            <x-anchor :href="route('employee.edit', $employee->id)">
                                <i class="fa fa-pen text-lg px-1"></i>
                            </x-anchor>
                            <x-anchor onclick="sweetConfirmLivewireEvent('Are you sure to delete this employee?', 'deleteEmployee', {{$employee->id}}, 'warning', 'This cannot be reverted.')">
                                <i class="fa fa-trash text-lg px-1"></i>
                            </x-anchor>
                        </x-table-cell>
                    </x-table-row>
                    @empty
                    <x-table-row>
                        <x-table-cell colspan="6" class="text-center py-48">Nothing here</x-table-cell>
                    </x-table-row>
                    @endforelse
                </x-table>
            </div>
        </div>
    </div>
    {{$employees->links()}}
</div>
</div>