<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        // dd(Book::get());
        
        return view('book.index', [
            'books' => Book::latest()->get(),
            // 'search' => Book::latest()->get()
        ]);
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('book.create', compact('authors', 'publishers'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'author_id' => 'required',
            'title' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'year' => 'numeric',
            'publisher_id' => 'required'
        ]);
    
        $coverPath = $request->file('cover')->store('cover', 'public');
    
        Book::create([
            'author_id' => $validatedData['author_id'],
            'title' => $validatedData['title'],
            'cover' => $coverPath, 
            'year' => $validatedData['year'],
            'publisher_id' => $validatedData['publisher_id']
        ]);
    
        session()->flash('success', 'Added Successfully');

        return redirect()->route('book.index');
        
    }
    public function search(Request $request)
        {
            $search_text = $_GET['search'];
            $books = Book::where('title', 'like', '%' .$search_text. '%')->get();
            return view('book.index', compact('books' ?? 'not found'));
        }

}
