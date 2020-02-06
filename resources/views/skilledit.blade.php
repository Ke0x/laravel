@extends ('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>     
        <table>
            <tr>
              <th> ID </th>
              <th> Name </th>
              <th> Description </th>
              <th> Photo </th>
            </tr>
            <tr>
              <td> {{ $ASkills -> id }} </td>
              <td> {{ $ASkills -> name }} </td>
              <td> {{ $ASkills -> description }} </td>
              <td> <img src="{{ asset($ASkills -> logo )}}" width="50px"> </td>
            </tr>
        </table>

        <form action="{{ route('editskill') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="id" type="hidden" value='{{ $ASkills -> id }}'>
        <input type="file" name="image">
        <input name="name" type="hidden" value='{{ $ASkills -> name }}'><br>
        <textarea type="text" placeholder="Description" name="description" value>{{ $ASkills -> description }}</textarea><br>
        <button type="submit"> Modifier </button>
        </form>

</body>
</html>
@endsection