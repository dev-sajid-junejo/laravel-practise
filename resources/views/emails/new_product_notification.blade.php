<!DOCTYPE html>
<html>
<head>
    <title>New Product Notification</title>
</head>
<body>
    <h1>Exciting News! 🎉</h1>
    <p>A new product has just been added to our shop: <strong>{{ $products->name }}</strong>.</p>
    <p>Check it out now and grab it before it's gone!</p>
    <p>Visit: <a href="{{ url('/category/' . $products->category->slug . '/' . $products->slug) }}">{{ $products->name }}</a></p>
</body>
</html>