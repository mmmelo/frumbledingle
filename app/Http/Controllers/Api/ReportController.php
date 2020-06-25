<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index( Request $request) {
    	$price = $request->price;
    	$items = DB::table('items as items');
		$items->selectRaw( 'distinct loc.name as loc_name, parent.name as parent_name, cat.name as cat_name, count(*) as count');
    	$items->join('locations as loc','items.location_id','=','loc.id');
    	$items->join('categories as cat','items.category_id','=','cat.id');
    	$items->leftjoin('categories as parent', 'cat.id','=', 'parent.id');
		$items->where('items.price','>=', $price);

		// Groupby
		$items->groupBy(DB::raw('loc_name, parent_name, cat_name'));

//	    dd($items->toSql());
    	return response()->json( $items->get());
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
