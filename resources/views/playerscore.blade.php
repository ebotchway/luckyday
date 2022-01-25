@extends('layouts.app')

@section('content')
<div class="container">
    {{-- {{dd($data)}} --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Player Scores') }}</div>

                <div class="card-body">
                    @if(!empty(session('successMsg')))
                        <div class="alert alert-success"> {{ session()->get('successMsg') }} {{ session()->forget('successMsg')}}</div>
                    @endif
                    @if(!empty(session('errorMsg')))
                        <div class="alert alert-danger"> {{ session()->get('errorMsg')}} {{session()->forget('errorMsg')}}</div>
                    @endif

                    <form style="float: right; margin: 5px;">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> <input type="button" value="Go Back" onclick="history.back()">
                    </form>

                    <br/>
                    <br/>
                    <h1>Player Scores and Win Details</h1>
                    <table class="table table-bordered data-table">
                        <caption>Player Scores</caption>
                        <thead>
                            <th scope="col">No</th>
                            <th scope="col">Player Name</th>
                            <th scope="col">S1</th>
                            <th scope="col">S1Q</th>
                            <th scope="col">S2</th>
                            <th scope="col">S2Q</th>
                            <th scope="col">S3</th>
                            <th scope="col">S3Q</th>
                            <th scope="col">Actions</th>
                        </thead>
                            <tbody>
                                <script type="text/javascript">
                                    $(function () {
                                        var table = $('.data-table').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: "{{ route('scores.show') }}",
                                            columns: [
                                                {data: 'id', name: 'id'},
                                                {data: 'pid_str', name: 'person.pname'},
                                                {data: '#1_win', name: '#1_win'},
                                                {data: '#1_question', name: '#1_question'},
                                                {data: '#2_win', name: '#2_win'},
                                                {data: '#2_question', name: '#2_question'},
                                                {data: '#3_win', name: '#3_win'},
                                                {data: '#3_question', name: '#3_question'},
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


