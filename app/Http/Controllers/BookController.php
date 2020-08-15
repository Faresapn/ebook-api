<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books') -> get();
        return response($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
      
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
          
            $title = $request->input('title');
            $description = $request->input('description');
            $author = $request->input('author');
            $publisher = $request->input('publisher');
            $dates = $request->input('date_of_issue');
 
 
            $data = new \App\Book();
            $data->title = $title;
            $data->description = $description;
            $data->author = $author;
            $data->publisher = $publisher;
            $data->date_of_issue = $dates;
     
            if($data->save()){
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Berhasil Menambah Buku',
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
          
                $title = $request->input('title');
                $description = $request->input('description');
                $author = $request->input('author');
                $publisher = $request->input('publisher');
                $dates = $request->input('date_of_issue');
     
     
                $data = \App\Book::where('id',$id)->first();
                $data->title = $title;
                $data->description = $description;
                $data->author = $author;
                $data->publisher = $publisher;
                $data->date_of_issue = $dates;
         
                if($data->save()){
                    return response()->json([
                        'status' => true,
                        'code' => 200,
                        'message' => 'Berhasil Update Buku',
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
        //
    
        try{
            $data = \App\Book::where('id',$id)->first();
            if($data->delete()){
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Berhasil Delete Buku',
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
