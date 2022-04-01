@extends('layouts.app')

@section('content')
    <div class="container-1 shadow-sm p-3 mb-5 bg-body rounded pt-20 px-80">
        <div class="d-flex justify-content-center gap-5">
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('status') }}
                </div>
            @endif
            <script type="text/javascript">
                /*<![CDATA[*/
                function clock() {
                    //generate time
                    var time = new Date();
                    var hours = time.getHours();
                    var minutes = time.getMinutes();
                    var seconds = time.getSeconds();

                    //add preceding 0s, if required
                    var hours = (hours < 10 ? '0' : '') + hours;
                    var minutes = (minutes < 10 ? '0' : '') + minutes;
                    var seconds = (seconds < 10 ? '0' : '') + seconds;

                    //generate formated time
                    var time = hours + ':' + minutes + ':' + seconds;

                    //get where abouts in the day it is
                    if (hours >= 0 && hours < 12) {
                        var greeting = 'Good morning Admin, Welcome!';
                    } else if (hours >= 12 && hours < 17) {
                        var greeting = 'Good afternoon Admin, Welcome!';
                    } else {
                        var greeting = 'Good evening Admin, Welcome!';
                    }

                    //display time
                    document.getElementById('clock').innerHTML = time + '<br />' + greeting;
                }
                //init clock
                window.onload = function() {
                    clock();
                    setInterval('clock()', 1000);
                }
                /*]]>*/
            </script>
            <span id="clock"></span>
            <br />
        </div>
        <br />
        <div class="d-flex justify-content-center gap-5">
            <a href="{{ route('players.show') }}">
                <button type="button" class="btn btn-primary btn-lg shadow-sm">
                    <i class="fas fa-tasks"></i> MANAGE PLAYERS
                </button>
            </a>
            <a href="{{ route('scores.show') }}">
                <button type=" button" class="btn btn-danger btn-lg shadow-sm">
                    <i class="fa fa-star" aria-hidden="true"></i> VIEW
                    PLAYER SCORES
                </button>
            </a>
            {{-- <a href="http://">
                <button type="button" class="btn btn-danger btn-lg shadow-sm">PICK PLAYER</button>
            </a> --}}
        </div>
        <div class="d-flex justify-content-center gap-5">
            <a href="{{ route('questions.show') }}">
                <button type="button" class="btn btn-warning btn-lg shadow-sm">
                    <i class="fa fa-question-circle" aria-hidden="true"></i> MANAGE QUESTIONS
                </button>
            </a>
            <a href="{{ route('prizes.show') }}">
                <button type="button" class="btn btn-success btn-lg shadow-sm">
                    <i class="fa fa-money" aria-hidden="true"></i> MANAGE PRIZES
                </button>
            </a>
            {{-- <a href="http://">
                <button type="button" class="btn btn-danger btn-lg shadow-sm">PICK PLAYER</button>
            </a> --}}
        </div>
    </div>
@endsection
