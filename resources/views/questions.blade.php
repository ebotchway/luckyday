@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- {{dd($data)}} --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Questions') }}</div>

                    <div class="card-body">
                        @if (!empty(session('successMsg')))
                            <div class="alert alert-success"> {{ session()->get('successMsg') }}
                                {{ session()->forget('successMsg') }}</div>
                        @endif
                        @if (!empty(session('errorMsg')))
                            <div class="alert alert-danger"> {{ session()->get('errorMsg') }}
                                {{ session()->forget('errorMsg') }}</div>
                        @endif

                        <br />
                        <br />
                        <h1>Here are all the questions for the game</h1>
                        <table class="table table-bordered data-table">
                            <caption>Questions</caption>
                            <thead>
                                <th scope="col">No</th>
                                <th scope="col">Stage</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody>
                                <script type="text/javascript">
                                    $(function() {
                                        var table = $('.data-table').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: "{{ route('questions.show') }}",
                                            columns: [{
                                                    data: 'id',
                                                    name: 'id'
                                                },
                                                {
                                                    data: 'stage',
                                                    name: 'stage'
                                                },
                                                {
                                                    data: 'question',
                                                    name: 'question'
                                                },
                                                {
                                                    data: 'answer',
                                                    name: 'answer'
                                                },
                                                {
                                                    data: 'action',
                                                    name: 'action',
                                                    orderable: false,
                                                    searchable: false
                                                },
                                            ]
                                        });

                                    });
                                </script>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <form style="float: right; margin: 5px;">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> <input type="button" value="Go Back"
                                onclick="history.back()">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
