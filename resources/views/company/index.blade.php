<x-app-layout>
    <div class="py-2"></div>
    @push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">  
    @endpush
    @push('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    @endpush

    <table id="company_table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

    @push('scripts')
    <script>
        $(function () {
            $('#company_table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: {
                    url: "{{route('company.dataTableFilter')}}",
                    method: 'POST',
                    beforeSend: function (request) {
                        request.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token()}}');
                    }
                },
                columns: [{
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'action',
                    name: 'action',
                    render: function(data, type, row) {
                        html = `<a href="{{url('company')}}/${row.id}/edit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"><i class="fa fa-pen"></i></a>`;
                        html += `<button type="button" class="inline-flex items-center px-4 py-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="deleteCompany(${row.id})"><i class="fa fa-trash"></i></button>`;
                        return html;
                    },
                    searchable: false
                }]
            });
        });

        function deleteCompany(company_id) {
            if (!confirm('Are you sure to delete this company?')) {
                return;
            }
            $.ajax({
                type: "delete",
                url: `{{url('company')}}/${company_id}`,
                data: {
                    _token: "{{csrf_token()}}"
                },
                success: function (response) {
                    window.location.reload();
                },
                error: function (error) {
                    alert(error.responseJSON.message);
                }
            });
        }
    </script>
    @endpush
</x-app-layout>
