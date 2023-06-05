<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>

    <h2>{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
   
    <!-- Add more details as needed -->

{{-- //<a href="{{ route('product.index') }}">Back to Products</a> --}}
</body>
</html>