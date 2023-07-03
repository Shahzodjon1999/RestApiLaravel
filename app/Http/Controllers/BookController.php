<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    public function index()
    {
        $books=Books::all();
        return response()->json($books);
    }

    public function store(Request $request) 
    {
        $books = new Books;
        $books->name=$request->name;
        $books->auther=$request->auther;
        $books->publish_data=$request->publish_data;
        $books->save();
        return response()->json([
            "massage"=>"Book added"
        ],201);
    }
    public function show($id)
    {
        $books=Books::find($id);
        if(!empty($books))
        {
            return response()->json($books);

        }
        else
        {
            return response()->json([
                "message"=>"Book not found"
            ],404);
        }
    }
    public function update(Request $request,$id)
    {
        if(Books::where('id',$id)->exists())
        {
            $books = Books::find($id);
            $books->name=is_null($request->name)?$books->name:$request->name;
            $books->auther=is_null($request->auther)?$books->auther:$request->auther;
            $books->publish_data=is_null($request->publish_data)?$books->publish_data:$request->publish_data;
            $books->save();
            return response()->json([
                "massage"=>"Book update"
            ],404);
        }    
        else
        {
            return response()->json([
                "massage"=>"Book not found"
            ],404);
        }
    }
    public function destroy($id)
    {
        if(Books::where('id',$id)->exists())
        {
            $books = Books::find($id);
            $books->delete();
            return response()->json([
                "message"=>"records deleted."
            ],202);
        } 
        else
        {
            return response()->json([
                "massage"=>"Book not found"
            ],404);
        } 
    }
}
