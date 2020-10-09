<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Book::get();
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
        //
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::create([
                "title" => $request->input('title'),
                "description" => $request->input('description'),
                "author" => $request->input('author'),
                "publisher" => $request->input('publisher'),
                "date_of_issue" => $request->input('date_of_issue')
            ]);
            
            return response(['message' => 'Create data success', 'data' => $data], 201);
        } else {
            return response(['message' => 'Not authenticated', 'data' => null], 401);
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
        return Book::find($id);
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
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::find($id)->update([
                "title" => $request->input('title'),
                "description" => $request->input('description'),
                "author" => $request->input('author'),
                "publisher" => $request->input('publisher'),
                "date_of_issue" => $request->input('date_of_issue')
            ]);
            return response(['message' => 'Update data success', 'data' => $data], 201);

        } else {
            return response(['message' => 'Not authenticated', 'data' => null], 401);
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
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::destroy($id);
            return response(['message' => 'Delete data success', 'data' => $data], 201);
            
        } else {
            return response(['message' => 'Not authenticated', 'data' => null], 401);
        }
    
    }
}