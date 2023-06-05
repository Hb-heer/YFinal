@extends('layouts.master')
 @section('edit')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <form method="POST" action="{{ route('products.update',$product->id) }}" class="mx-5">
        @csrf
        @method('PUT')

        <label for="name">name:</label>
        <input type="text" name="name" required>{{ $product->name }}<br><br>

        <label for="description">description:</label>
        <textarea name="description" required>{{ $product->description }}</textarea><br><br>

        <label for="sku">sku:</label>
        <textarea name="sku" required>{{ $product->sku }}</textarea><br><br>

        <label for="regularprice">regularprice:</label>
        <textarea name="regularprice" required>{{ $product->regularprice }}</textarea><br><br>

        <label for="saleprice">saleprice:</label>
        <textarea name="saleprice" required>{{ $product->saleprice }}</textarea><br><br>

        <label for="Brand">Brand:</label>
        <textarea name="Brand" required>{{ $product->Brand }}</textarea><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>

@endsection

