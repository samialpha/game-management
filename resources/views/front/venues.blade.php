@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Venues</h1>

                <table class="table">
                    <tr>
                        <th>Venues</th>
                        
                    </tr>
                    @forelse($venues as $venue)
                        <tr>
                            <td>{{ $venue->name }}</td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No Venues.</td>
                        </tr>
                    @endforelse
                </table>

            </div>
        </div>
    </div>
@endsection
