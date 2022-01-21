@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session()->has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                    <script type="text/javascript">
                    /*<![CDATA[*/
                        function clock()
                        {
                            //generate time
                            var time = new Date();
                            var hours = time.getHours();
                            var minutes = time.getMinutes();
                            var seconds = time.getSeconds();

                            //add preceding 0s, if required
                            var hours = (hours < 10 ? '0' : '')+hours;
                            var minutes = (minutes < 10 ? '0' : '')+minutes;
                            var seconds = (seconds < 10 ? '0' : '')+seconds;

                            //generate formated time
                            var time = hours+':'+minutes+':'+seconds;

                            //get where abouts in the day it is
                            if(hours >= 0 && hours < 12)
                            {
                                var greeting = 'Good morning Admin, Welcome!';
                            }
                            else if(hours >= 12 && hours < 18)
                            {
                                var greeting = 'Good afternoon Admin, Welcome!';
                            }
                            else
                            {
                                var greeting = 'Good evening Admin, Welcome!';
                            }

                            //display time
                            document.getElementById('clock').innerHTML = time+'<br />'+greeting;
                        }
                        //init clock
                        window.onload = function()
                        {
                            clock();
                            setInterval('clock()', 1000);
                        }
                    /*]]>*/
                    </script>
                    <span id="clock"></span>
                    <br/>
                    <br/>
                    <br/>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <a href="{{ route('players') }}">
                                <button class='btn btn-primary'>MANAGE PLAYERS</button>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="#">
                                <button class='btn btn-primary'>VIEW PLAYER SCORES</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


