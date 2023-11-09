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
    <title>{{$book->title}}</title>
</head>
<body>
    <h1>{{$book->title}}</h1>
    <p>Book ID: {{$book->id}}</p>
    <p>Author: {{$book->author}}</p>
    <p>Price: {{$book->price}}</p>
    <p>
        @if ($book->stock > 0)
            Stock: {{$book->stock}}
        @else
            Out of stock
        @endif
    </p>

    <form method="post" action="{{route('book.issue')}}" id="issue_form">
        @csrf
        @method('post')
        <input type="hidden" name="book" value="{{$book->id}}">
        <label for="member">Choose a member:</label>
        <select name="member" id="member">
            @foreach ($members as $member )
                <option value="{{$member->id}}">{{$member->id}}&nbsp{{$member->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Issue">
    </form>
    <div>
        <ul>
            @foreach ($issues as $issue )
                @foreach ($members as $member)
                    @if ($member->id == $issue->member)
                        <li>
                            {{$issue->member}}&nbsp;{{$member->name}}&nbsp;
                            @if ($issue->returned == null)

                            <form method="post" action="{{route('book.return', ['issue'=>$issue->id, 'book'=>$book])}}">
                                @csrf
                                @method('put')
                                <input type="hidden" name="returned" value="1">
                                <input type="hidden" name="returned_on" id="current_time" value="{{$currentDateTimeString}}"> {{-- Passing the time the book was returned--}}
                                <input type="submit" value="Return">
                            </form>
                            @endif
                        </li>
                    @endif
                @endforeach
            @endforeach
        </ul>
    </div>
    <script>
        // Setting up current time to pass the time a book is returned
        // var date = new Date();
        // var currentTime = date.toString();
        // document.getElementById("current_time").value = currentTime;
    </script>
</body>
</html>
