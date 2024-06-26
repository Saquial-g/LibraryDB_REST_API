<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

# Controller in charge of managing interactions with the database
class LibraryController extends Controller
{
    # ------------ CRUD Operations ------------

    # Create
    public function new(Request $request) {

        if($this->isValidBook($request)){
            try {
                $book = Book::create([
                    'title' => $request-> input('title'),
                    'author' => $request-> input('author'),
                    'publication_date' => $request-> input('publication_date'),
                    'genre' => $request-> input('genre'),
                ]);
            }
            catch(Exception $e) {
                return response()->json($e, 400);
                die();
            }
            $book -> save();
            return response()->json($book, 200);
        }
        else {
            return response()->json(null, 400);
        }
        
    }

    # Read
    public function index() {
        $books = Book::all();
        if ($books->isEmpty()){
            return response()->json(null, 404);
            die();
        }
        return response()->json($books, 200);
    }

    public function book($id) {
        $book = Book::find($id);
        if ($book==null){
            return response()->json(null, 404);
            die();
        }
        return response()->json($book, 200);
    }

    # Update
    public function update(Request $request, $id) {
        $book = Book::find($id);
        if ($book==null){
            return response()->json(null, 404);
            die();
        }

        if($this->isValidBook($request)){
            $book->update($request->all());
            return response()->json($book, 200);
        }
        else {
            return response()->json(null, 400);
        }
    }

    # Delete
    public function remove($id) {
        Book::destroy($id);
        return response()->json(null, 204);
    }

    # ------------ Aditional functions ------------

    # Checks that there are no empty parameters and that the date is valid
    private function isValidBook($book) {
        if ($book->title == null || $book->author == null || $book->genre == null) {
            return FALSE;
        }
        if ($this->invalidDate($book->publication_date)){
            return FALSE; 
        }
        return TRUE;
    }

    # Checks if the date is invalid or has an invalid format
    private function invalidDate($date) { 
        try{
            list($year, $month, $day) = explode('-', $date); 
            return !checkdate($month, $day, $year); 
        }
        catch(\Exception $e) {
            return TRUE;
        }
    } 
}
