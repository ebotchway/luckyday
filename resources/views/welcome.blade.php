@extends('layouts.app')

@section('content')
    <div class="row  align-items-center rounded-3 border  ">
        <div class="col-lg-5 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1"> </h1>
            <p class="lead"></p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <a href="{{ route('pickplayer') }}">
                    <button type="button" class="btn-lg fw-bold">
                        <i class="fa fa-random" aria-hidden="true"></i>
                        PICK PLAYERS
                    </button>
                </a>
                <a href="{{ route('game.pick') }}">
                    <button type="button" class="btn-lg fw-bold">
                        <i class="fa fa-gamepad" aria-hidden="true"></i>
                        PLAY GAME
                    </button>
                </a>
            </div>
        </div>
        <div class="col-lg-4 ">
            <img class="rounded-lg-3" src="{{ asset('img/lucky.png') }}" alt="" width="720">
        </div>
    </div>
@endsection
