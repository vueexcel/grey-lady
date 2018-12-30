<?php

//https://itsolutionstuff.com/post/laravel-57-create-rest-api-with-authentication-using-passport-tutorialexample.html

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     
        $FavoriteListings = FavoriteListing::where('user_id', Auth::id())->get();

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
            'listing_id' => 'required',
            'listing_address' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input['user_id'] = Auth::id();
        $FavoriteListing = FavoriteListing::updateOrCreate($input);



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


        if (is_null($FavoriteListing) ) {
            return $this->sendError('FavoriteListing not found.');
        }

        if ( $FavoriteListing->user_id !== Auth::id() ) {
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
    public function update(Request $request, $id)
    {

        $input = $request->all();


        $validator = Validator::make($input, [
            'listing_id' => 'required',
            'listing_address' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $FavoriteListing = FavoriteListing::find($id);

        if ($FavoriteListing->user_id == Auth::id()) {

            $FavoriteListing->listing_id = $input['listing_id'];
            $FavoriteListing->listing_address = $input['listing_address'];
            $FavoriteListing->user_id = Auth::id();
            $FavoriteListing->save();

            return $this->sendResponse($FavoriteListing->toArray(), 'FavoriteListing updated successfully.');
            
        } else {
            return $this->sendError('You do not have access to this');
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $FavoriteListing = FavoriteListing::find($id);

        if ( is_null($FavoriteListing) || $FavoriteListing->user_id !== Auth::id() ) {
            return $this->sendError('FavoriteListing not found.');
        }

        $FavoriteListing->delete();

        return $this->sendResponse($FavoriteListing->toArray(), 'FavoriteListing deleted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyByGreylady($id)
    {

        $FavoriteListing = FavoriteListing::where('greylady_id', '=', $id)->first();

        if ( is_null($FavoriteListing) || $FavoriteListing->user_id !== Auth::id() ) {
            return $this->sendError('FavoriteListing not found.');
        }

        $FavoriteListing->delete();

        return $this->sendResponse($FavoriteListing->toArray(), 'FavoriteListing deleted successfully.');
    }
}