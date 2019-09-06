<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trago;
use Validator;


class TragosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       $input = $request->all();

       $validator = Validator::make($input,[
            'name' => 'required',
            'description' => 'required',
            'price' =>'required'
       ]);

       if($validator->fails()){
           $response = [
               'success' => false,
               'data' => 'Validator Error',
               'message' => $validator->errors()
           ];

           return response()->json($response, 404);
       }


       $trago = Trago::create($input);

       $data = $trago->toArray();

       $response = [
           'success' => true,
           'data' => $data,
           'message' => 'Trago agregado a la carta'
       ];

       return response()->json($response, 200);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Solicitamos al modelo el Trago con el id selicitado por GET
        $trago = Trago::findOrFail($id);
        return $trago->pedidos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //busca los datos para editarlos

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
        $trago = Trago::find($id);
        //recibe los datos y los edita
        $input = $request->all();

        $validator = Validator::make($input,[
            'name' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];

            return response()->json($response, 404);
        }

        $trago->name = $input['name'];
        $trago->description = $input['description'];
        $trago->save();
        
        $data = $trago->toArray();
        
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Trago actualizado correctamente.'
        ];

        return response()->json($response, 200);


        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trago = Trago::find($id);
        $trago->delete();

        $data = $trago->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Trago eliminado'
        ];

        return response()->json($response, 200);
    }

    


}
