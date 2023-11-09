<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Add a book</title>
</head>
<body>
    <header>
        <h1><a href="{{route('book.index')}}">One Books</a></h1>
        <div id="add_book_button_container">
            <a href="{{route('book.add')}}" id="add_book_button">Add Books</a>
        </div>
    </header>
    <main id="add_form_main" class="non-flex">
        <h2 class="page_heading">Add Book</h2>
        <form method="post" action="{{route('book.store')}}" id="book_add_form">
            @csrf
            @method('post')
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter title here">
            </div>
            <div>
                <label for="author">Author</label>
                <input type="text" id="author" name="author" placeholder="Enter author here">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" step="0.01"  id="price" name="price" placeholder="Enter price here">
            </div>
            <div>
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" placeholder="Enter stock here">
            </div>
            <div>
                <input type="submit" value="Add Book">
            </div>
        </form>
    </main>
    <footer>
        &copy; 2023 Shafeeq Ahmed
    </footer>
</body>
</html>
