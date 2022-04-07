@extends('layouts.app')

@section('content')
    <style>
        .scene {
            width: 200px;
            height: 120px;
            margin: 40px 0;
            perspective: 600px;
            border-radius: 25px;
        }

        .card {
            position: relative;
            width: 100%;
            height: 100%;
            cursor: pointer;
            transform-style: preserve-3d;
            transform-origin: center right;
            transition: transform 1s;
            border-radius: 25px;
        }

        .card.is-flipped {
            transform: translateX(-100%) rotateY(-180deg);
        }

        .card__face {
            position: absolute;
            width: 100%;
            height: 100%;
            line-height: 200%;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 40px;
            backface-visibility: hidden;
            border-radius: 25px;
        }

        .card__face--front {
            background: #C1C6C4;
        }

        .card__face--back {
            background-size: contain;
            background-repeat: no-repeat;
            transform: rotateY(180deg);
        }

    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="row col-md-3">
                <div class="col-md-12">
                    <div class="p-5 bg-white  shadow p-3 mb-2 bg-body rounded">
                        <h4>PLAYER'S INFO</h4>
                        <hr width="100%">
                        <span class="badge rounded-pill bg-primary ">FULL NAME</span>
                        <span class="p-3">{{ $datagame->pname }}</span><BR>
                    </div><br>
                    <div class="p-5 bg-white  shadow p-3 mb-2 bg-body rounded">
                        <h4>ITEMS WON</h4>
                        <hr width="100%">
                        <span class="badge rounded-pill bg-primary ">ITEMS</span>
                        <span class="p-3">{{ 'no value for now' }}</span><BR>
                    </div>
                    <div class="p-5 bg-white  shadow p-3 mb-2 bg-body rounded">
                        <h4>CASH PRIZE</h4>
                        <hr width="100%">
                        <span class="badge rounded-pill bg-primary ">AMT WON (₵)</span>
                        <span class="p-3" id="winner-cash">0</span><BR>
                    </div>

                </div>
            </div>

            <div class="col-md-9">
                <div class="bg-white rounded shadow">

                    <div class="row justify-content-center">
                        <input type="hidden" value="{{ $i = 1 }}">
                        @foreach ($prizes as $prize)
                            <div class="scene scene--card">
                                <div class="card" id="card-{{ $i }}">
                                    <div class="card__face card__face--front" style="background: #FFA894 !important;">
                                        {{ $i }}
                                    </div>
                                    <div class="card__face card__face--back" style="background-color: red"
                                        id="prize-value-{{ $i }}">{{ $prize->prize }}</div>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $i++ }}">
                        @endforeach
                    </div>

                    <br />
                    <br />
                    <div class="row">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a>
                                    <button class="btn-danger rounded-pill" style="width: 100px; padding: 15px; margin:2px"
                                        type="button">END</button>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="questions.html">
                                    <button class="btn-primary rounded-pill" style="width: 100px; padding: 15px; margin:2px"
                                        type="button">NEXT</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </div>

    <script>
        var cards = document.querySelectorAll('.card');

        var prize_amt = [];

        for (let i = 0; i < cards.length; i++) {
            cards[i].addEventListener('click', function() {
                cards[i].classList.toggle('is-flipped');
                prize_amt.push(document.getElementById('prize-value-' + (i + 1)).textContent);
                prize_amt = prize_amt.map(Number);
                Tot_prize_amt = prize_amt.reduce((a, b) => a + b, 0);
                document.getElementById("winner-cash").innerHTML = Tot_prize_amt;
            });
        }
    </script>
@endsection
