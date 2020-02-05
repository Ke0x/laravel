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
    
    <form action="{{ route('image') }}" method="POST" enctype="multipart/form-data">
@csrf

        <input type="file" name="image" class="form-control">
        <select name='id'>
          @foreach ($AUser as $skills)
            <option value='{{ $skills -> id }}'> {{ $skills -> name }} </option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-success">Upload</button>
        
</form> 
        <table>
            <tr>
              <th> ID </th>
              <th> Name </th>
              <th> Email </th>
              <th> Skills </th>
              <th> Action </th>
            </tr>
            @foreach ($ALlusers as $AllUser)
            <tr>
              <td> {{ $AllUser -> id }} </td>
              <td> {{ $AllUser -> name }} </td>
              <td> {{ $AllUser -> email }} </td>
              <td> 
              @foreach ($AllUser->skills as $skills)
                {{ $skills -> name }}
               @endforeach
              </td>
              <td width="50%"><a href="{{ url('admin/' . $AllUser -> id ) }}" >Modifier</a></td>
            </tr>
            @endforeach
        </table>

</body>
</html>
@endsection