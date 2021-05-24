<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body style="text-align: center;">
<h1>Edit Todo</h1>
    <form action="/admin/update" method="post"> 
    @csrf
    
        <input type="text" name="title" value="{{ $todo->title }}">
        <input type="number" name="id" style="display: none;" value="{{ $todo->id }}">
        <input type="submit" value="Update"><br>
        <span class="text-danger">@error('title'){{ $message }} @enderror</span>
        
    </form>
    <br>
    <a href="/admin/dashboard">Back</a>
</body>
</html>