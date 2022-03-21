@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Select Player') }}</div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            @if (count($datagame) != 0)
                                @foreach ($datagame as $gamers)
                                    <div class="row col-auto">
                                        <button id="players" class="pill-button"
                                            onclick="selected()">{{ $gamers->person->pname }}</button>
                                    </div>
                                @endforeach
                            @else
                                <div class="row col-auto">
                                    <em>There are no players yet</em>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function selected() {
                document.getElementById('players').classList.toggle("selected-player");
            };
        </script>
    </div>
@endsection
