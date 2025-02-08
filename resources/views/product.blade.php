<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
{{-- offline bootstrap --}}
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- custom css --}}
<link href="{{ asset('custom.css') }}" rel="stylesheet">


</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <img src="{{ asset('product/' . $product->image) }}" alt="{{ $product->name }}" height="300" width="300" class="img-fluid rounded">
            </div>
    
            <!-- Product Details -->
            <div class="col-md-6">
                <h2 class="fw-bold">{{ $product->name }}</h2>
                <h4 class="text-success">#{{ number_format($product->price, 2) }}</h4>
                <p class="text-muted">{{ $product->description }}</p>
    
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        <i class="material-icons" data-toggle="tooltip" title="Add to Cart">shopping_cart</i> Add to Cart
                    </button>
                    <button class="btn btn-outline-danger">
                        <i class="material-icons" data-toggle="tooltip" title="Add to Wishlist">favorite</i>Add to Wishlist
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Additional Product Details -->
        <div class="row mt-5">
            <div class="col-12">
                <h4>Product Details</h4>
                <table class="table">
                    <tr>
                        <th>Name:</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Stock:</th>
                        <td>{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td>{{ $product->description }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</script>
</html>