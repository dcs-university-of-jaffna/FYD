<?php

namespace App\Http\Controllers;

use App\Surgent;
use Illuminate\Http\Request;

class SurgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $surgents=Surgents::all();

        return View::make('surgents.index')
            ->with('surgents', $surgents);
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
            $surgent = new surgent();

                $surgent->id = $request->id;
                $surgent->doctor_id = $request->doctor_id;
                $surgent->specialist = $request->specialist;

                $surgent->save();
            $response['status'] = "Success";
            $response['msg'] = "Add surgent";
            $response['is_success'] = true;
            $response['data'] =$surgent;
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
     * @param  \App\Surgent  $surgent
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
            $surgent = Surgent::find($id);
            $response['status'] = "Success";
            $response['msg'] = "Get one surgent";
            $response['is_success'] = true;
            $response['data'] = array('surgent-'=>$surgent);
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
     * @param  \App\Surgent  $surgent
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgent $surgent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surgent  $surgent
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
            $surgent = Surgent::find($id);

            $surgent->id = $request->id;
            $surgent->doctor_id = $request->doctor_id;
            $surgent->specialist = $request->specialist;

            $surgent->save();
            $response['status'] = "Success";
            $response['msg'] = "Update surgent";
            $response['is_success'] = true;
            $response['data'] =$surgent;
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
     * @param  \App\Surgent  $surgent
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
            $surgent = Surgent::find($id);
            $surgent->delete();
            $response['status'] = "Success";
            $response['msg'] = "Delete surgent";
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
