@extends('master')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col mx-auto">
                    <div class="card">
                        <h3 class="text-center">Yajra Datatable Advance AJAX CRUD</h3>
                        <div class="card-body">
                            <table class="table table-bordered" id="userTable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users.data') }}',
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: true }
                ]
            });
        });

        // AJAX CRUD
        $('#userTable').on('click', '.view-btn', function () {
            var userId = $(this).data('id');
            // Perform AJAX request for viewing user details
        });

        $('#userTable').on('click', '.edit-btn', function () {
            var userId = $(this).data('id');
            // Perform AJAX request for editing user details
        });

        $('#userTable').on('click', '.delete-btn', function () {
            var userId = $(this).data('id');
            // Perform AJAX request for deleting user
        });
    </script>
@endsection
