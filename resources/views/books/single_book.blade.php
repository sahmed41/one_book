<?php
    use Carbon\Carbon;
    $currentDateTime = Carbon::now();
    $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>{{$book->title}}</title>
</head>
<body>
    <header>
        <h1><a href="{{route('book.index')}}">One Books</a></h1>
        <div id="header_button_container">
            <a href="{{route('book.add')}}" id="add_book_button">Add Books</a>
            <a href="{{route('authenticate.logout')}}" id="logout_button">Logout</a>
        </div>
    </header>

    <main id="single_book_main" class="non-flex">
        <h2 class="page_heading">{{$book->title}}</h2>
        <div id="book_related">
            <div id="book_information">
                <p id="single_book_id"><span class="label">Book ID:</span> {{$book->id}}</p>
                <p id="single_book_author"><span class="label">Author:</span> {{$book->author}}</p>
                <p id="single_book_price"><span class="label">Price:</span> Rs. {{$book->price}}</p>
                <p
                @if ($book->stock > 0)
                    id="single_book_stock"
                    @else
                    id="single_book_out_of_stock"
                @endif
                >
                    @if ($book->stock > 0)
                        {{$book->stock}} Available in stock
                    @else
                        Out of stock
                    @endif
                </p>
            </div>

            @if ($book->stock > 0)
                <form method="post" action="{{route('book.issue')}}" id="issue_form">
                    @csrf
                    @method('post')
                    <h3>Lend Book</h3>
                    <input type="hidden" name="book" value="{{$book->id}}">
                    <label for="member">Choose a member:</label>
                    <select name="member" id="member">
                        @foreach ($members as $member )
                            <option value="{{$member->id}}">{{$member->id}}&nbsp{{$member->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Lend">
                </form>
            @endif

        </div>
        <div id="issuances">
            <h3>Issuances</h3>
            @foreach ($issues as $issue )
                @foreach ($members as $member)
                    @if ($member->id == $issue->member)
                        <div class="issue_card">
                            <p><span class=label>Issue  ID:</span>{{$issue->id}}</p>
                            <p><span class=label>Issued to:</span>{{$member->name}}</p>
                            <p><span class=label>Issued Date:</span> {{$issue->issue_on}}</p>
                            @if ($issue->returned == null)
                            <form method="post" action="{{route('book.return', ['issue'=>$issue->id, 'book'=>$book])}}" class="issue_return_form">
                                @csrf
                                @method('put')
                                {{-- Handing errors --}}
                                @if ($errors->any())
                                <ul id="errors">
                                    @foreach ($errors->all() as $error )
                                    <li id="error">{{$error}}</li>
                                    @endforeach
                                </ul>
                                @endif
                                {{-- ---------------- --}}
                                <input type="hidden" name="returned" value="1">
                                <input type="hidden" name="returned_on" id="current_time" value="{{$currentDateTimeString}}"> {{-- Passing the time the book was returned--}}
                                <input type="submit" value="Return">
                            </form>
                            @else
                            <p class="issue_returned">Returned</p>
                            @endif
                        </div>

                    @endif
                @endforeach
            @endforeach
        </div>

    </main>

    <footer>
        &copy; 2023 Shafeeq Ahmed
    </footer>
</body>
</html>
