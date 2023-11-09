<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookIssuance;
use App\Models\Book;
// use App\Models\Member;

use Illuminate\Support\Facades\DB;


class BookIssuanceController extends Controller
{
    //

    public function lend(Request $request) {
        $data = $request->validate([
            'book' => 'required|numeric',
            'member' => 'required|numeric',
            'returned' => 'nullable'
        ]);

        DB::table('books')->where('id', $request->book)->decrement('stock');

        $newIssuance = BookIssuance::create($data);
        return redirect(route('book.singleBook', ['book' => $request->book]));

    }

    public function return(BookIssuance $issue, Book $book, Request $request) {
        // dd($book);
        $data = $request->validate([
            'returned' => 'required',
            'returned_on' => 'required|date_format:Y-m-d H:i:s'
        ]);
        DB::table('books')->where('id', $request->book)->increment('stock');
        // DB::table('books')->where('id', $request->book)->increment('stock',1);
        // Book::find($request->book)->increment('stock');

        // $book = Book::find($customer_id);
        // $loyalty_points = $customer->loyalty_points + 1;
        // $customer->update(['loyalty_points' => $loyalty_points]);


        $issue->update($data);
        return redirect(route('book.singleBook', ['book' => $issue->book]))->with('success', 'Book is successfully returned');

    }





}
