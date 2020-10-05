@extends('layouts.layout')

@section('content')

    <h1>Battle screen</h1>

    <h5>Game id: {{$game->id}}</h5>
    <h5>Game status: @if($game->active) active @else not active @endif</h5>

    <input type="hidden" class="js-game-id" value="{{$game->id}}">

    <input type="hidden" class="js-is-game-active" value="{{$game->active}}">

    <input type="hidden" class="js-is-game-over" value="0">

    <div class="js-all-game-armies-div">

        <input type="hidden" class="js-all-game-armies" value="{{$game->armiesInOrderForAttack()}}">

    </div>

    <input type="hidden" class="js-number-of-game-armies" id="js-number-of-game-armies" value="{{$game->armies->count()}}">

    <input type="hidden" class="js-next-army-to-attack-id" value="@isset($nextArmyToAttack) {{$nextArmyToAttack->id}} @endisset">

    <label class="lead" for="army-name">Army name:</label>
    <input type="text" class="form-control js-army-name" id="army-name" placeholder="Add army name" required><br><br>

    <label class="lead" for="army-units">Army units(80-100):</label>
    <input type="number" class="form-control js-army-units" name="army-units" id="army-units" min="80" max="100" value="{{intval(80)}}" required><br><br>

    <label class="lead" for="army-strategy">Choose attack strategy:</label>
    <select class="form-control js-army-strategy" name="army-strategy" id="army-strategy">

        @forelse($attackStrategies as $attackStrategy)

            <option value="{{$attackStrategy->id}}">{{$attackStrategy->name}}</option>

        @empty

        @endforelse
    </select><br>

    <button class="btn btn-success js-create-army">Create New Army</button>
    <br><br>

    <div class="js-created-armies-div">

        <h5>Created armies:</h5><br>

        @forelse($game->armiesInOrderForAttack() as $army)

            <p><strong>Army name:</strong> {{$army->name}} <strong>Units:</strong> {{$army->units}} <strong>Strategy:</strong> attack {{$army->attackstrategy->name}}</p>

        @empty

        @endforelse

    </div><hr>

    <div class="js-start-the-game-div">

        @if(!$game->active)

            <div class="js-starting-buttons-div">

                <button class="btn btn-info js-start-the-game">Start the battle</button>

                <button class="btn btn-info js-start-autorun-game">Autorun the battle</button>

                <h5>You need at least 5 created armies to use this command</h5>

            </div>

        @else

            <div class="js-next-attack-button">

                <button class="btn btn-info js-attack-next">Next attack</button>

            </div>

        @endif

    </div>

    <div class="js-battle-log">



    </div>

@endsection

@section('script')


    <script>

        $(document).ready(function () {

            $('.js-create-army').click(storeArmy);
            $('.js-start-the-game').click(startTheGame);
            $('.js-attack-next').click(startTheGame);
            $('.js-start-autorun-game').click(autorunGame);

        })

    </script>

@endsection
