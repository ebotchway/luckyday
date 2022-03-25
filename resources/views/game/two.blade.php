@extends('layouts.app')

@section('content')
    <style>
        /* Box Flis */
        .cards-wrapper {
            margin-top: 50px;
        }

        .card-container {
            perspective: 1200px;

        }

        .card {
            margin: 0 auto;
            height: 200px;
            width: 200px;
            max-width: 80%;
            position: relative;
            border-radius: 25px;
            transition: all 3s ease;
            transform-style: preserve-3d;
            box-shadow: 1px 3px 3px rgba(0, 0, 0, 0.2);


        }

        .rotated {
            transform: rotateY(-180deg);
        }

        .card-contents {
            width: 100%;
            height: 100%;
            border-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
            backface-visibility: hidden;

        }

        .card-depth {
            transform: translateZ(100px) scale(0.982);
            perspective: inherit;

        }

        .card-front {
            background: linear-gradient(to top left, #dc2626, #dc2626);
            transform-style: preserve-3d;
        }

        .card-back {
            transform: rotateY(180deg);
            background: linear-gradient(to top left, #2a6aee, #2a6aee);
            transform-style: preserve-3d;
        }

        .card:hover {
            z-index: 100;
            animation: scale 0.4s linear;
            animation-fill-mode: forwards;

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
                        <span class="p-3">Ama Forson</span><BR>
                    </div><br>
                    <div class="p-5 bg-white  shadow p-3 mb-2 bg-body rounded">
                        <h4>ITEMS WON</h4>
                        <hr width="100%">
                        <span class="badge rounded-pill bg-primary ">ITEMS</span>
                        <span class="p-3">Kettle, fan, oven</span><BR>
                    </div>
                    <div class="p-5 bg-white  shadow p-3 mb-2 bg-body rounded">
                        <h4>CASH PRIZE</h4>
                        <hr width="100%">
                        <span class="badge rounded-pill bg-primary ">AMT WON (₵)</span>
                        <span class="p-3">80,000.00</span><BR>
                    </div>

                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white rounded shadow">
                    <div class="row justify-content-center">
                        <div class="col-md-9 card-container">
                            <div class="col-md-9 cards-wrapper">
                                <div class="card-container">
                                    <div class="card">
                                        <div class="card-contents card-front">
                                            <div class="card-depth">
                                                <h2 class="text-white text-4xl">A</h2>
                                            </div>
                                        </div>
                                        <div class="card-contents card-back">
                                            <div class="card-depth ">
                                                <h2 class="text-white text-4xl">Burner</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        const card = document.querySelector('.card');

        function clickRotate() {
            card.classList.toggle('rotated');
        }

        card.addEventListener('click', clickRotate);
    </script>
@endsection
