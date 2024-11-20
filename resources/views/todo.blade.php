<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
</head>
<body>
    <h1>Halaman Todo</h1>
    <form action="/to-do" method="POST">
        @csrf
        <input type="text" name="activity" placeholder="Type ur Activity.." value="{{old('activity')}}">
        <button type="submit">Submit</button>
    </form>
    @error('activity')
    <i style="color: brown;">{{$message}}</i>
    @enderror
    @session('success')
    <i style="color: green;">{{session('success')}}</i>
    @endsession
    @session('tes')
    <i style="color: blue;">{{session('tes')}}</i>
    @endsession
    @session('hapus')
    <i style="color: red;">{{session('hapus')}}</i>
    @endsession
    <ul>
    @foreach($data as $d)
    <li style="display: flex; margin-bottom: 20px; flex-direction: row; justify-content:center;">{{$d->name_activity}} 
        <a href="/update-activity/{{$d->id}}" style="margin-left: 100px">UPDATE</a>
        <form action="{{route('delete.activity', ['id' => $d->id])}}" style="margin-left: 100px" method="POST">
            @method('DELETE')
            @csrf
        <button type="submit">
            DELETE
        </button>
    </form>
    </li>
    @endforeach
    </ul>
</body>
</html>