<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
</head>
<body>
    <h1> my name is {{$name}} </h1>

    <form  action="send" method="POST">
    @csrf
    name
    <input type="text" name="myname" id="myname">
    <input type="submit" value="send">
    </form>

</body>
</html>
