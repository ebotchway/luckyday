@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Players Information') }}</div>

                <div class="card-body">
                    @if(!empty(session('successMsg')))
                        <div class="alert alert-success"> {{ session()->get('successMsg') }}</div>

                        <div>{{session()->flush()}}</div>
                    @endif
                    @if(!empty(session('errorMsg')))
                        <div class="alert alert-danger"> {{ session()->get('errorMsg')}}</div>

                        <div>{{session()->flush()}}</div>
                    @endif

                    <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                    <div class="custom-file text-left">
                                        <input type="file" name="file" class="custom-file-input" id="customFile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary"><i class="fas fa-file-import"></i> Import data</button>
                            </div>
                        </div>
                    </form>

                    <br/>
                    <br/>
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
                                            ajax: "{{ route('player.show') }}",
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

