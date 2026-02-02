<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="{{route('Product.update',2)}}" method="post">
    @method('PATCH')
    <a href="{{rout()}}"></a>
    <input type="text">
  </form>
   
</body>
</html>