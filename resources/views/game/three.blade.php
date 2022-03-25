@extends('layouts.app')

@section('content')
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
                <div class="bg-white rounded shadow card-container">
                    <div class="popup">
                        <div class="shadow-sm p-3 mb-5 bg-body rounded pt-20  ">
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="bttn btn-primary btn-lg shadow-sm">A</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="bttn btn-danger btn-lg shadow-sm">B</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="bttn btn-secondary btn-lg shadow-sm">C</button>
                            </div>
                            <div class="d-flex justify-content-center gap-2 px-50">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="bttn btn-success btn-lg shadow-sm">D</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="bttn btn-warning btn-lg shadow-sm">E</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="bttn btn-info btn-lg shadow-sm">F</button>
                            </div>
                            <br><br><br><br>
                            <div class="d-grid gap-2 col-4 mx-auto"><a href="questions.html">
                                    <button class="btn btn-primary rounded-pill" type="button">NEXT</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ITEM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div><br><br>
                        <div class="modal-body">
                            <center>
                                <h1>WASHING MACHINE</h1>
                            </center><br><br>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
