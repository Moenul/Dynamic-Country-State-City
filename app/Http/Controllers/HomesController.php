<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();

        return view('welcome', compact('countries'));
    }

    public function search(Request $request)
    {
        $output ='';
        $countries = Country::where('name','Like','%%'.$request->search.'%')->get();
        $states = State::where('name','like','%'.$request->search.'%')->get();
        $citis = City::where('name','like','%'.$request->search.'%')->get();

        foreach($countries as $country)
        {
            $output.=
            '<tr>
            <td> '.$country->name.' </td>
            </tr>';
        }

        foreach($states as $state)
        {
            $output.=
            '<tr>
            <td> <b>'.$state->country->name.' -> </b>'.$state->name.' </td>
            </tr>';
        }

        foreach($citis as $city)
        {
            $output.=
            '<tr>
            <td> <b>'.$city->state->country->name.' -> </b> <b>'.$city->state->name.' -> </b>'.$city->name.' </td>
            </tr>';
        }

        return response($output);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
