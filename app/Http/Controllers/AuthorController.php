<?php

namespace App\Http\Controllers;

use App\Author as Author;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(AuthorResource::collection(Author::all(), 200));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->toArray(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
        ]);

        return response(new AuthorResource(Author::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return response(new AuthorResource($author), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
        ]);

        $author->update($data);

        return response($author->update($data), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        foreach($author->books as $book)
        {
            $book->delete();
        }

        $author->delete();
        return response(null, 204);
    }
}
