<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update TODO</title>
</head>
<body>
    <h1>Update Todo</h1>
    <form action="{{route('update.activity', ['id' => $activity->id])}}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="activity" placeholder="Type ur Activity.." value="{{$activity->name_activity}}">
        <button type="submit">Submit</button>
    </form>
    @error('activity')
    <i style="color: brown;">{{$message}}</i>
    @enderror
    @session('success')
    <i style="color: green;">{{session('success')}}</i>
    @endsession
    
</body>
</html>