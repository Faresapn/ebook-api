<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = DB::table('authors') -> get();
        if($author && $author -> count() > 0)
        {
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $author,
            ], 200);
        }
        return response($author);
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
          
            $name = $request->input('name');
            $dateBirth  = $request->input('date_of_birth');
            $placeBirth = $request->input('place_of_birth');
            $gender     = $request->input('gender');
            $email      = $request->input('email');
            $hp         = $request->input('hp');
 
 
            $data = new \App\Author();
            $data->name = $name;
            $data->date_of_birth = $dateBirth;
            $data->place_of_birth = $placeBirth;
            $data->gender = $gender;
            $data->email = $email;
            $data->hp = $hp;
     
            if($data->save()){
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Berhasil Menambah Author',
                    'data' => $data,
                ], 200);
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'code' => 200,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{
          
            $name = $request->input('name');
            $dateBirth  = $request->input('date_of_birth');
            $placeBirth = $request->input('place_of_birth');
            $gender     = $request->input('gender');
            $email      = $request->input('email');
            $hp         = $request->input('hp');
 
 
            $data = \App\Author::where('id',$id)->first();
            $data->name = $name;
            $data->date_of_birth = $dateBirth;
            $data->place_of_birth = $placeBirth;
            $data->gender = $gender;
            $data->email = $email;
            $data->hp = $hp;
     
            if($data->save()){
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Berhasil Update Author',
                    'data' => $data,
                ], 200);
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'code' => 200,
                'message' => $e->getMessage()
            ], 200);
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
        try{
            $data = \App\Author::where('id',$id)->first();
            if($data->delete()){
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Berhasil Delete Author',
                ], 200);
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'code' => 200,
                'message' => $e->getMessage()
            ], 200);
        }
    }
}
