@extends('layouts.layout')

@section('content')

    <h1>Battle screen</h1>

    <input type="hidden" class="js-game-id" value="{{$game->id}}">

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

        @forelse($game->armies as $army)

            <p><strong>Army name:</strong> {{$army->name}} <strong>Units:</strong> {{$army->units}} <strong>Strategy:</strong> attack {{$army->attackstrategy->name}}</p>

        @empty

        @endforelse

    </div><hr>

    <div class="js-start-the-game-div">



    </div>

    <h5>You need at least 5 created armies to use this command</h5>

@endsection

@section('script')


    <script>

        $(document).ready(function () {

            $('.js-create-army').click(storeArmy);

        })

    </script>

@endsection
