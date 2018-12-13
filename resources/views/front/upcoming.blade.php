@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 align="center">Upcoming Games</h1>

                <table class="table">
                    <tr>
                        <th>Start</th>
                        <th>Teams</th>
                    </tr>
                    @forelse($games as $game)
                        <tr>
                            <td>{{ $game->start_time }}</td>
                            <td>{{ $game->team1->name }} - {{ $game->team2->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No games.</td>
                        </tr>
                    @endforelse
                </table>

                <hr />

           
            </div>
        </div>
    </div>
@endsection
