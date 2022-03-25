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
                                    <ul style="list-style-type: none;">
                                        <div class="col-auto">
                                            <li>
                                                <a href="game/one/{{ $gamers->id }}">
                                                    <button id="players"
                                                        class="pill-button">{{ $gamers->pname }}</button>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
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
    </div>
@endsection
