<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <style id="web-highlights-global-styles">
        body.web-highlights-open {

            background-color: red;
        }
    </style> --}}
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome</h1>
    <a href="{{route('book.add')}}">Add Books</a>

    <div id="cont">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Open</th>
                <th>Edit Link</th>
                <th>Delete</th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        @if ($book->stock > 0)
                            {{$book->stock}}
                        @else
                            Out of stock
                        @endif
                    </td>
                    <td>
                        <a href="{{route('book.singleBook', ['book' => $book])}}">Open</a>
                    </td>
                    <td>
                        <a href="{{route('book.edit', ['book' => $book])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('book.destroy', ['book'=>$book])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>

                </tr>
            @endforeach

        </table>
    </div>
    @if (session()->has('success'))
        <script>
            alert("{{session('success')}}");
        </script>
    @endif
</body>
</html>
