<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\FavoriteZips;
use Validator;


class FavoriteZipsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $FavoriteZipss = FavoriteZips::where('user_id', Auth::id())->get();

        return $this->sendResponse($FavoriteZipss->toArray(), 'FavoriteZipss retrieved successfully.');
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
            'zip_code' => 'required',
            'zip_code_town' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input['user_id'] = Auth::id();
        $FavoriteZips = FavoriteZips::create($input);



        return $this->sendResponse($FavoriteZips->toArray(), 'FavoriteZips created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FavoriteZips = FavoriteZips::find($id);


        if (is_null($FavoriteZips) ) {
            return $this->sendError('FavoriteZips not found.');
        }

        if ( $FavoriteZips->user_id !== Auth::id() ) {
            return $this->sendError('FavoriteZips not found.');
        }

        


        return $this->sendResponse($FavoriteZips->toArray(), 'FavoriteZips retrieved successfully.');
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
        
        // dd($id);

        $input = $request->all();


        $validator = Validator::make($input, [
            'zip_code' => 'required',
            'zip_code_town' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $FavoriteZips = FavoriteZips::find($id);

        if ($FavoriteZips->user_id == Auth::id()) {

            $FavoriteZips->zip_code = $input['zip_code'];
            $FavoriteZips->zip_code_town = $input['zip_code_town'];
            $FavoriteZips->user_id = Auth::id();
            $FavoriteZips->save();

            return $this->sendResponse($FavoriteZips->toArray(), 'FavoriteZips updated successfully.');
            
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
        
        $FavoriteZips = FavoriteZips::find($id);

        // dd($FavoriteZips);

        if (is_null($FavoriteZips) || $FavoriteZips->user_id !== Auth::id() ) {
            return $this->sendError('FavoriteZips not found.');
        }

        $FavoriteZips->delete();

        return $this->sendResponse($FavoriteZips->toArray(), 'FavoriteZips deleted successfully.');
    }
}