<x-app-layout>
    <p>{{__('text.name')}}: {{$company->name}}</p>
    <p>{{__('text.email')}}: {{$company->email}}</p>
    @if($company->logo_path)
    <img src="{{asset('storage/' . $company->logo_path)}}" alt="Company logo" width="100px">
    @endif
</x-app-layout>