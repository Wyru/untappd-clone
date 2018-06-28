<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brewery;
use App\Http\Requests\CreateBreweryRequest;

class BreweryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breweries = Brewery::all();
        return view('breweries.index', compact('breweries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('breweries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBreweryRequest $request)
    {
        $input = $request->all();
        $input['logo'] = '';
        $brewery = Brewery::create($input);

        $file_path = 'breweries/logo'; 
        $brewery->logo = $brewery->uploadFile($request->file('logo'), $file_path); 

        $brewery->save();

        return redirect()->route('breweries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brewery = Brewery::find($id);
        $checkIns = $brewery->checkIns()
            ->orderBy('check_ins.created_at', 'DESC')
            ->paginate(15);
        return view('breweries.show',compact('brewery', 'checkIns'));
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

    public function beers($id){
        $brewery = Brewery::find($id);
        return view('breweries.beers',compact('brewery'));
    }
}
