@extends('layouts.layout')

@section('content')

            <h1 class="text-center">This is the battle simulator test page</h1><br>

            <input type="hidden" class="js-game-id">

            <input type="hidden" class="js-active-games-limit" value="{{$activeGamesLimit}}">

            <h3 class="text-muted">Create new game/battle and add at least 5 armies before starting the game.</h3><br>

            <button class="btn btn-success js-create-game">Create New Game</button><hr>

            <div>

                <h4>All created games(can't have more then 5 active):</h4>

                @forelse($games as $game)

                    <p><a href="{{route('game.show', $game->id)}}">{{$game->id}}</a>@if($game->active) active @else finished @endif</p>

                @empty

                    <p>No created games.</p>

                @endforelse

            </div>

@endsection

@section('script')


    <script>

        $(document).ready(function () {

            $('.js-create-game').click(storeGame);

        })

    </script>

@endsection

