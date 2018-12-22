<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\FavoriteListing;
use Validator;


class FavoriteListingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FavoriteListings = FavoriteListing::all();


        return $this->sendResponse($FavoriteListings->toArray(), 'FavoriteListings retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $FavoriteListing = FavoriteListing::create($input);


        return $this->sendResponse($FavoriteListing->toArray(), 'FavoriteListing created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FavoriteListing = FavoriteListing::find($id);


        if (is_null($FavoriteListing)) {
            return $this->sendError('FavoriteListing not found.');
        }


        return $this->sendResponse($FavoriteListing->toArray(), 'FavoriteListing retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FavoriteListing $FavoriteListing)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $FavoriteListing->name = $input['name'];
        $FavoriteListing->detail = $input['detail'];
        $FavoriteListing->save();


        return $this->sendResponse($FavoriteListing->toArray(), 'FavoriteListing updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FavoriteListing $FavoriteListing)
    {
        $FavoriteListing->delete();


        return $this->sendResponse($FavoriteListing->toArray(), 'FavoriteListing deleted successfully.');
    }
}