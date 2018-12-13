<?php

namespace App\Http\Controllers\Admin;

use App\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVenuesRequest;
use App\Http\Requests\Admin\UpdateVenuesRequest;

class VenuesController extends Controller
{
    /**
     * Display a listing of Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* if (! Gate::allows('venue_access')) {
            return abort(401);
        } */

        $venues = Venue::all();
        

        return view('admin.venues.index', compact('venues')); 

    }

    /**
     * Show the form for creating new Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.venues.create');
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param  \App\Http\Requests\StoreVenuesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVenuesRequest $request)
    {

        $team = Venue::create($request->all());



        return redirect()->route('admin.venues.index');
    }


    /**
     * Show the form for editing Team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $team = Team::findOrFail($id);

        return view('admin.venues.edit', compact('venue'));
    }

    /**
     * Update Team in storage.
     *
     * @param  \App\Http\Requests\UpdateVenuesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVenuesRequest $request, $id)
    {

        $team = Venue::findOrFail($id);
        $team->update($request->all());



        return redirect()->route('admin.venues.index');
    }


    /**
     * Display Team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



        $venue = Team::findOrFail($id);

        return view('admin.venues.show', compact('venue','games', 'games'));
    }


    /**
     * Remove Team from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $team = Venue::findOrFail($id);
        $team->delete();

        return redirect()->route('admin.venues.index');
    }

    /**
     * Delete all selected Team at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Venue::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
