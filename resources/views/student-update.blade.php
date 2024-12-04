<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Update Student</h2>
    @session('success')
    <i style="color: green;">{{session('success')}}</i>
    @endsession
    <form action="{{ route('student.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input type="text" name="student_name" placeholder="Type ur Activity.." value="{{ $data->student_name }}">
        @error('student_name')
        <i style="color: brown;">{{$message}}</i>
        @enderror
        <div>
        <select name="student_class">
            <option value="">Choose Class</option>
            <option value="X" @if($data->student_class == 'X') Selected @endif>X</option>
            <option value="XI" @if($data->student_class == 'XI') Selected @endif>XI</option>
            <option value="XII" @if($data->student_class == 'XII') Selected @endif>XII</option>
        </select>
        @error('student_class')
        <i style="color: brown;">{{$message}}</i>
        @enderror
    </div>
    <div>
        <select name="student_major">
            <option value="">Choose Major</option>
            <option value="PPLG" @if($data->student_class == 'PPLG') Selected @endif>PPLG</option>
            <option value="DKV" @if($data->student_class == 'DKV') Selected @endif>DKV</option>
            <option value="TJKT" @if($data->student_class == 'TJKT') Selected @endif>TJKT</option>
            <option value="MPLB" @if($data->student_class == 'MPLB') Selected @endif>MPLB</option>
            <option value="HR" @if($data->student_class == 'HR') Selected @endif>HR</option>
            <option value="TMP" @if($data->student_class == 'TMP') Selected @endif>TMP</option>
            <option value="TBSM" @if($data->student_class == 'TBSM') Selected @endif>TBSM</option>
            <option value="TKRO" @if($data->student_class == 'TKRO') Selected @endif>TKRO</option>
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
</body>
</html>