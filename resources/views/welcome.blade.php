@extends('layouts.app')

@section('content')
<div class="bgimg">
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <br><br>
                <br><br>
                <br><br>
                <br><br>
                <br><br>
                <br><br>
                <br><br>
                <br><br>
            </div>
            <div class="col-md-4 align-left">
                <div class="card">
                    <div class="card-header text-center">{{ __('WELCOME') }}</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="#">
                                    <button class='btn btn-primary'><i class="fa fa-random" aria-hidden="true"></i> PICK PLAYERS</button>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="#">
                                    <button class='btn btn-primary'><i class="fa fa-gamepad" aria-hidden="true"></i> PLAY LUCKYDAY</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <br><br>
            </div>
        </div>
    </div>
</div>
@endsection
