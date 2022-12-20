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

    @if (Session::has('errors'))

     @foreach (Session::get('errors')->all() as $error)
     <h5 style="background-color: #f00 ; color :#fff">{{ $error }}</h5>
     @endforeach

     @endif

    <form action="{{ route('depar.store') }}" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="enter your name"><br/>
        <textarea name="description" id="description" cols="30" rows="10">enter your description</textarea><br/>
        <button type="submit">add department</button>
    </form>

</body>
</html>
