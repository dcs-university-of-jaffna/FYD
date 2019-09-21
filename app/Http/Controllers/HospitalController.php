<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals=Hospitals::all();

        return View::make('hospitals.index')
            ->with('hospitals', $hospitals);
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
            $hospital = new hospital();

                $hospital->id = $request->id;
                $hospital->hospital_name = $request->doctor_name;
				$hospital->telephone_no= $request->telephone_no;
				$hospital->licence_id = $request->licence_id;
                $hospital->open_time = $request->open_time;
                $hospital->close_time = $request->close_time;
				$hospital->pharmacy = $request->pharmacy;
                $hospital->scan = $request->scan;
                $hospital->x_ray = $request->x_ray;
				

                $hospital->save();
            $response['status'] = "Success";
            $response['msg'] = "Add hospital";
            $response['is_success'] = true;
            $response['data'] =$hospital;
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
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $hospital = Hospital::find($id);
            $response['status'] = "Success";
            $response['msg'] = "Get one hospital";
            $response['is_success'] = true;
            $response['data'] = array('hospital'=>$hospital);
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
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $hospital = Hospital::find($id);
			
			$hospital->id = $request->id;
            $hospital->hospital_name = $request->doctor_name;
			$hospital->telephone_no= $request->telephone_no;
			$hospital->licence_id = $request->licence_id;
			$hospital->open_time = $request->open_time;
			$hospital->close_time = $request->close_time;
			$hospital->pharmacy = $request->pharmacy;
			$hospital->scan = $request->scan;
			$hospital->x_ray = $request->x_ray;	
            

            $hospital->save();
            $response['status'] = "Success";
            $response['msg'] = "Update hospital";
            $response['is_success'] = true;
            $response['data'] =$hospital;
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
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $hospital = Hospital::find($id);
            $hospital->delete();
            $response['status'] = "Success";
            $response['msg'] = "Delete hospital";
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
