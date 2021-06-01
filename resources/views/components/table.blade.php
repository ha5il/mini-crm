<table class="min-w-full divide-y divide-gray-200">
    <x-table-head :headings="$headings" />
    <tbody class="bg-white divide-y divide-gray-200">
        {{$slot}}
    </tbody>
</table>