<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Add new</title>
</head>
<body style="text-align:center">
    <h1>Add new</h1>
    <form action="/admin/upload" method="post"> 
    @csrf
        <input type="text" name="title"><input type="submit" value="Add"><br>
        <span class="text-danger">@error('title'){{ $message }} @enderror</span>
        
    </form>
    <br>
    <a href="/admin/dashboard">Back</a>
</body>
</html>