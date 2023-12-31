<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Out Product Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
            crossorigin="anonymous">
    </head>
    <body>
    <h1>Selected Products</h1>
    <hr>
    <form action="{{ route('selectOutProduct') }}" method="GET">
    @csrf
    <button type="submit" class="btn btn-primary">Select More Products</button>
</form>
    <a href="dashboard">Back to dashboard</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>        
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        @if (!empty($mergedProducts) && count($mergedProducts) > 0)
        @foreach ($mergedProducts as $product)
                    <tr>
                        <td>{{ $product->productName }}</td>
                        <td>${{ $product->productPrice }}</td>
                        <td>{{ $product->productQuantity }}</td>
                    </tr>
                @endforeach
                @else
            <tr>
                <td colspan="3">No selected products.</td>
               
            </tr>
        @endif
        </tbody>
    </table>
</div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
            crossorigin="anonymous">
    </script>
</html>