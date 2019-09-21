<?php

namespace App\Http\Controllers;

use App\Physician;
use Illuminate\Http\Request;

class PhysicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $physicians=Physicians::all();

        return View::make('physicians.index')
            ->with('physicians', $physicians);
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
            $physician = new physician();

                $physician->id = $request->id;
                $physician->doctor_id = $request->doctor_id;

                $physician->save();
            $response['status'] = "Success";
            $response['msg'] = "Add physician";
            $response['is_success'] = true;
            $response['data'] =$physician;
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
     * @param  \App\Physician  $physician
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        try{
            $response = array(
                'status'=>"Failed",
                'msg'=>'',
                'is_success'=>false,
                'data'=>''
            );
            $physician = Physician::find($id);
            $response['status'] = "Success";
            $response['msg'] = "Get one physician";
            $response['is_success'] = true;
            $response['data'] = array('physician-'=>$physician);
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
     * @param  \App\Physician  $physician
     * @return \Illuminate\Http\Response
     */
    public function edit(Physician $physician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Physician  $physician
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
            $physician = Physician::find($id);

            $physician->id = $request->id;
            $physician->doctor_id = $request->doctor_id;

            $physician->save();
            $response['status'] = "Success";
            $response['msg'] = "Update physician";
            $response['is_success'] = true;
            $response['data'] =$physician;
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
     * @param  \App\Physician  $physician
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
            $physician = Physician::find($id);
            $physician->delete();
            $response['status'] = "Success";
            $response['msg'] = "Delete physician";
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
