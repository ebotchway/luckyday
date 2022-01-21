@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>Player Information</h1>
                    <table class="table table-bordered data-table">
                        <caption>Player Information</caption>
                        <thead>
                            <th scope="col">No</th>
                            <th scope="col">Player Name</th>
                            <th scope="col">Player Phone #</th>
                            <th scope="col">Player Location</th>
                            <th scope="col">Actions</th>
                        </thead>
                            <tbody>
                                <script type="text/javascript">
                                    $(function () {
                                        var table = $('.data-table').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: "{{ route('users.index') }}",
                                            columns: [
                                                {data: 'id', name: 'id'},
                                                {data: 'name', name: 'name'},
                                                {data: 'phone_num', name: 'phone_num'},
                                                {data: 'location', name: 'location'},
                                                {data: 'action', name: 'action', orderable: false, searchable: false},
                                            ]
                                        });

                                    });
                                </script>
                            </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


