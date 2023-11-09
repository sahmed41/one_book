<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">

    <title>One Books</title>
</head>
<body>
    <header>
        <h1><a href="{{route('book.index')}}">One Books</a></h1>
        <div id="add_book_button_container">
            <a href="{{route('book.add')}}" id="add_book_button">Add Books</a>
        </div>
    </header>

    <main>
        @foreach ($books as $book)
        <div class="book_card">
            <h2>Title: {{$book->title}}</h2>
            <p class="book_id">Book ID: {{$book->id}}</p>
            <p class="book_author">By: {{$book->author}}</p>
            <p class="book_price">Price: {{$book->price}}</p>
            <p
                @if ($book->stock > 0)
                    class="book_stock"
                    @else
                    class="book_out_of_stock"
                @endif
            >
                @if ($book->stock > 0)
                    {{$book->stock}} Available in stock
                @else
                    Out of stock
                @endif
            </p>
            <div class="buttons">
                <a href="{{route('book.singleBook', ['book' => $book])}}" class="open_button">Open</a>
                <a href="{{route('book.edit', ['book' => $book])}}" class="edit_button">Edit</a>
                <form method="post" action="{{route('book.destroy', ['book'=>$book])}}" class="delete_form">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="delete_button">
                </form>
            </div>
        </div>
        @endforeach
    </main>
    <footer>
        &copy; 2023 Shafeeq Ahmed
    </footer>
    @if (session()->has('success'))
        <script>
            alert("{{session('success')}}");
        </script>
    @endif

</body>
</html>
