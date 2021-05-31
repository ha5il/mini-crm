<thead>
    <tr>
        @foreach($headings as $heading)
        <th class="px-5 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
        {{$heading}}
        </th>
        @endforeach
    </tr>
</thead>