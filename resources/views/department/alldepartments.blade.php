<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if (Session::has('done'))
        <h4>{{ Session('done') }}</h4>
    @endif
    <a href="{{route('depar.create')}}"><h3>Create</h3></a>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        @foreach ($departments as $department )
        <tr>
            <td>{{$department->name; }}</td>
            <td>{{ $department->description; }}</td>
            <td>
                <form method="POST" action="{{ route('depar.delete') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="department_id" value="{{ $department->id }}">
                    <button type="submit">delete</button>
                </form>


                {{-- <a href="{{ route('depar.delete',[$department->id]) }}">delete</a> --}}

            </td>

            <td> <a href="{{ route('depar.edit' , $department->id) }}">Edit</a> </td>
        </tr>
        @endforeach

    </table>

</body>
</html>
