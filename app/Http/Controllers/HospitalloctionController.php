<?php

namespace App\Http\Controllers;

use App\Hospitalloction;
use Illuminate\Http\Request;

class HospitalloctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $locations=Locations::all();

        return View::make('locations.index')
            ->with('locations', $locations);
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
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $location = new location();

                $location->id = $request->id;
				$location->hospital_id = $request->hospital_id;
				$location->branch_id = $request->branch_id;
				$location->location_id = $request->location_id;
				
                $location->save();
            $response['status'] = "Success";
            $response['msg'] = "Add location";
            $response['is_success'] = true;
            $response['data'] =$location;
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospitalloction  $hospitalloction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $location = Location::find($id);
            $response['status'] = "Success";
            $response['msg'] = "Get one doctor";
            $response['is_success'] = true;
            $response['data'] = array('location'=>$location);
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospitalloction  $hospitalloction
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospitalloction $hospitalloction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospitalloction  $hospitalloction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
			$location = Location::find($id);

            $location->id = $request->id;
            $location->hospital_id = $request->hospital_id;
            $location->branch_id = $request->branch_id;
			$location->location_id = $request->location_id;

            $location->save();
            $response['status'] = "Success";
            $response['msg'] = "Update location";
            $response['is_success'] = true;
            $response['data'] =$location;
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospitalloction  $hospitalloction
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $location = Location::find($id);
            $location->delete();
            $response['status'] = "Success";
            $response['msg'] = "Delete location";
            $response['is_success'] = true;
            return response()->json($response);
        }
        catch(Exception $e)
        {
            $response['status'] = "Failed";
            $response['msg'] = $e->getMessage();
            $response['is_success'] = false;
            return response()->json($response); 
        }
    }
}
