@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Select Player') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        @foreach ($datagame as $gamers)
                            <div class="row">
                                <button id="players" class="pill-button" onclick="selected()">{{$gamers->person->pname}}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <a href="{{ route('players.show') }}">
                                <button class='btn btn-primary'><i class="fas fa-tasks"></i> MANAGE PLAYERS</button>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('scores.show') }}">
                                <button class='btn btn-primary'><i class="fa fa-star" aria-hidden="true"></i> VIEW PLAYER SCORES</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selected(){
            document.getElementById('players').classList.toggle("selected-player");
        };
    </script>
</div>
@endsection
