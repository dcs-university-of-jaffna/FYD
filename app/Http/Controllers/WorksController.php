<?php

namespace App\Http\Controllers;

use App\Works;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works=Works::all();

        return View::make('works.index')
            ->with('works', $works);
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
            $works = new works();

                $works->id = $request->id;
                $works->hospital_id = $request->hospital_id;
                $works->doctor_id = $request->doctor_id;
				$works->working_time= $request->working_time;
                $works->working_days = $request->working_days;

                $works->save();
            $response['status'] = "Success";
            $response['msg'] = "Add work";
            $response['is_success'] = true;
            $response['data'] =$works;
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
     * @param  \App\Works  $works
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
            $works = Works::find($id);
            $response['status'] = "Success";
            $response['msg'] = "Get one work";
            $response['is_success'] = true;
            $response['data'] = array('works'=>$works);
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
     * @param  \App\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function edit(Works $works)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $works = Works::find($id);

				$works->id = $request->id;
                $works->hospital_id = $request->hospital_id;
                $works->doctor_id = $request->doctor_id;
				$works->working_time= $request->working_time;
                $works->working_days = $request->working_days;

                $works->save();
				
            $response['status'] = "Success";
            $response['msg'] = "Update work";
            $response['is_success'] = true;
            $response['data'] =$doctor;
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
     * @param  \App\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $works = Works::find($id);
            $works->delete();
            $response['status'] = "Success";
            $response['msg'] = "Delete work";
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
