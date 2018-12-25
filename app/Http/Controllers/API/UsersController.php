<?php

//https://itsolutionstuff.com/post/laravel-57-create-rest-api-with-authentication-using-passport-tutorialexample.html

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use App\FavoriteZips;
use App\FavoriteListing;
use Validator;


class UsersController extends BaseController
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $Users = Auth::user();


        if (is_null($Users) ) {
            return $this->sendError('User not found.');
        }

        return $this->sendResponse($Users->toArray(), 'Users retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'phone' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $Users = Auth::user();

        $Users->name = $input['name'];
        $Users->phone = $input['phone'];
        $Users->save();

        return $this->sendResponse($Users->toArray(), 'Users updated successfully.');
            
        
    }

    public function allInfo()
    {
     

        $FavoriteZips = FavoriteZips::where('user_id', Auth::id())->get();
        $FavoriteListings = FavoriteListing::where('user_id', Auth::id())->get();
        $Users = Auth::user();

        $response = array();
        $response['user'] = $Users->toArray();
        $response['favorite_listings'] = $FavoriteListings->toArray();
        $response['favorite_zips'] = $FavoriteListings->toArray();

        return $this->sendResponse($response, 'User, FavoriteZips and FavoriteListings retrieved successfully.');
    }

}