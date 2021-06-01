<x-app-layout>
    <p>Name: {{$company->name}}</p>
    <p>Email: {{$company->email}}</p>
    @if($company->logo_path)
    <img src="{{asset('storage/' . $company->logo_path)}}" alt="Company logo" width="100px">
    @endif
</x-app-layout>