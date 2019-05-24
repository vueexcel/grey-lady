<?php

//https://itsolutionstuff.com/post/laravel-57-create-rest-api-with-authentication-using-passport-tutorialexample.html

namespace App\Http\Controllers\API;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\ParseError;
use Validator;


class ParseErrorAPIController extends BaseController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // $validator = Validator::make($input, [
        //     'zip_code' => 'required',
        //     'zip_code_town' => 'required',
        //     'greylady_id' => 'required'
        // ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());       
        // }

        $input['user_id'] = Auth::id();

        $parseError = ParseError::create($input);



        return $this->sendResponse($parseError->toArray(), 'parseError created successfully.');
    }



}