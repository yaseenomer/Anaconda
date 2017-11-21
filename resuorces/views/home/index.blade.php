<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
  <h1>  my view</h1>
<p>welcome from view </p>



<ul>

    @foreach($posts as $po)
        <li> {{$po['title']}}</li>
    @endforeach

</ul>

Count of post = {{ $count }}



</body>
</html>