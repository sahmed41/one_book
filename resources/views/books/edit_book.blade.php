<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Update book</title>
</head>
<body>
    <header>
        <h1><a href="{{route('book.index')}}">One Books</a></h1>
        <div id="header_button_container">
            <a href="{{route('book.add')}}" id="add_book_button">Add Books</a>
            <a href="{{route('authenticate.logout')}}" id="logout_button">Logout</a>
        </div>
    </header>
    <main id="update_form_main" class="non-flex">
        <h2 class="page_heading">Update Book</h2>

        <form method="post" action="{{route('book.update', ["book" => $book])}}" id="book_update_form">
            @csrf
            @method('put')
            {{-- Handling Errors --}}
            @if ($errors->any())
            <ul id="errors">
                @foreach ($errors->all() as $error )
                <li id="error">{{$error}}</li>
                @endforeach
            </ul>
            @endif
            {{-- -------------- --}}
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter title here" value="{{$book->title}}">
            </div>
            <div>
                <label for="author">Author</label>
                <input type="text" id="author" name="author" placeholder="Enter author here" value="{{$book->author}}">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" step="0.01"  id="price" name="price" placeholder="Enter price here" value="{{$book->price}}">
            </div>
            <div>
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" placeholder="Enter stock here" value="{{$book->stock}}">
            </div>
            <div>
                <input type="submit" value="Update">
            </div>
        </form>
    </main>
    <footer>
        &copy; 2023 Shafeeq Ahmed
    </footer>
</body>
</html>
