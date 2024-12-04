<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>List Student</h2>
    @session('success')
    <i style="color: green;">{{session('success')}}</i>
    @endsession
    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="student_name" placeholder="Type ur Activity.." value="{{old('student_name')}}">
        @error('student_name')
        <i style="color: brown;">{{$message}}</i>
        @enderror
        <div>
        <select name="student_class">
            <option value="">Choose Class</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select>
        @error('student_class')
        <i style="color: brown;">{{$message}}</i>
        @enderror
    </div>
    <div>
        <select name="student_major">
            <option value="">Choose Major</option>
            <option value="PPLG">PPLG</option>
            <option value="DKV">DKV</option>
            <option value="TJKT">TJKT</option>
            <option value="MPLB">MPLB</option>
            <option value="HR">HR</option>
            <option value="TMP">TMP</option>
            <option value="TBSM">TBSM</option>
            <option value="TKRO">TKRO</option>
        </select>
        @error('student_major')
        <i style="color: brown;">{{$message}}</i>
        @enderror
    </div>
    <div>
        <input type="file" name="photo">
        @error('photo')
        <i style="color: brown;">{{$message}}</i>
        @enderror
    </div>
        <button type="submit">Submit</button>
        
    </form>
    <h3 style="text-align: center">DATA STUDENT</h3>
    <table style="border: 2px solid black; width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Major</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $d->student_name }}</td>
                <td>{{ $d->student_class }}</td>
                <td>{{ $d->student_major }}</td>
                <td><img src="{{ $d->photo }}" width="200" /></td>
                <td>
                    <a href="/student/{{ $d->id }}">UPDATE</a>


                    <form method="POST" action="{{ route('student.destroy',  $d->id) }}">
                        @csrf
                        @method('DELETE')
                    <button type="submit">
                        DELETE
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>