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
              <th> Email </th>
              <th> Skills </th>
            </tr>

            <tr>
              <td> {{ $AUser -> id }} </td>
              <td> {{ $AUser -> name }} </td>
              <td> {{ $AUser -> email }} </td>
              <td> 
              @foreach ($AUser->skills as $skills)
                {{ $skills -> name }}
               @endforeach
              </td>
            </tr>
        </table>

        <table>
            <tr>
              <th> ID </th>
              <th> Name </th>
              <th> Description </th>
              <th> Level </th>
            </tr>
            @foreach ($AUser->skills as $skills)
            <tr>
              <td> {{ $skills -> id }} </td>
              <td> {{ $skills -> name }} </td>
              <td> {{ $skills -> description }} </td>
              <td> {{ $skills -> pivot -> level }} </td>
            </tr>
               @endforeach
            </table>
        <form action="admin/add" method="POST">
        @csrf
        <select name='id'>
          @foreach ($ASkills as $skills)
            <option value='{{ $skills -> id }}'> {{ $skills -> name }} </option>
          @endforeach
        </select>
        <input type="text" placeholder="level" name="level"><br>
        <button type="submit"> Ajouter </button>
        </form>

        <form action="admin/update" method="POST">
        @csrf
        <select name='id'>
          @foreach ($AUser->skills as $skills)
            <option value='{{ $skills -> id }}'> {{ $skills -> name }} </option>
          @endforeach
        </select>
        <input type="text" placeholder="level" name="level"><br>
        <button type="submit"> Modifier </button>
        </form>

        <form action="admin/delete" method="POST">
        @csrf
        <select name='id'>
          @foreach ($AUser->skills as $skills)
            <option value='{{ $skills -> id }}'> {{ $skills -> name }} </option>
          @endforeach
        </select>
        <button type="submit"> Supprimer </button>
        </form>
</body>
</html>
@endsection