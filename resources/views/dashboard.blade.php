<x-app-layout>
    <div class="py-2"></div>

    @foreach (array_chunk($countCards, 4) as $chuncked)
    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4 px-3">
        @foreach ($chuncked as $countCard)
        <div class="w-full lg:w-1/4 cursor-pointer" onclick="window.location.href='{{$countCard['route']}}'">
            <div class="widget w-full p-4 rounded-lg bg-white border border-grey-100 hover:bg-gray-300">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-grey-500">{{$countCard['text']}}</div>
                        <div class="text-xl font-bold">{{$countCard['count']}}</div>
                    </div>
                    <i class="stroke-current text-grey-500 {{$countCard['icon']}}"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</x-app-layout>
