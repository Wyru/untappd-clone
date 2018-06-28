<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Brewery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateBeerRequest;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breweries = Brewery::all();
        return view('beers.create', compact('breweries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBeerRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();

        if($input['brewery_id'] === 'new'){
            $request->validate([
                'brewery_name' => 'required|string|unique:brewery,name',
                'brewery_logo' => 'required|image',
                'brewery_location' => 'required|string',
            ]);

            $brewery = Brewery::create([
                'name' => $input['brewery_name'],
                'logo' => $input['brewery_logo'],
                'location' => $input['brewery_location'],
                'type' => $input['brewery_type'],
                'country' => $input['country_location'],
            ]);
            
        }
        $input['photo'] = '';
        $beer = Beer::create($input);

        $file_path = 'beer/photo'; 
        $beer->photo = $beer->uploadFile($request->file('photo'), $file_path); 

        $beer->save();
        DB::commit();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beer  = Beer::find($id);
        $checkIns = $beer->checkIns()->orderBy('created_at', 'DESC')->paginate(15);
        return view('beers.show', compact('beer', 'checkIns'));
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
