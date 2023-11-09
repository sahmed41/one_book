<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;
use App\Models\BookIssuance;


use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function index() {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    // The following function takes you to the view where the book adding form is
    public function add() {
        return view('books.add_book');
    }

    // The function stores the book information in database
    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|decimal:0,2',
            'updated_at ' => 'nullable',
        ]);

        $newBook = Book::create($data);

        return redirect(route('book.index'));
    }

    // The functions gets the information of the product to be edited
    public function edit(Book $book) {
        return view('books.edit_book', ['book' => $book]);
    }

    // The functions  edits the book information in the database
    public function update(Book $book, Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|decimal:0,2'
        ]);

        $book->update($data);
        return redirect(route('book.index'))->with('success', 'Product updated successfully');
    }

    // The functions  deletes the book from the database
    public function destroy(Book $book) {
        $book->delete();
        return redirect(route('book.index'))->with('success', 'Product deleted successfully');
    }

    // The functions gets the information of an individual page to be viewed
    public function singleBook(Book $book) {
        $members = Member::all(); // Storing all member information in a variable
        // $book_issuances = BookIssuance::all(); // Storing all member information in a variable
        $book_issuances = DB::table('book_issuances')->where('book', $book->id)->get(); // Storing all member information in a variable
        return view('books.single_book', ['book' => $book, 'members' => $members, 'issues'=> $book_issuances]); // Passing the book and members information for issuance
    }
}
