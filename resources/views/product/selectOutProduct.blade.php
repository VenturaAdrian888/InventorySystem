<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h4>Search Products</h4><br>
        
        <form action="{{ route('selectOutProduct') }}" method="POST" id="searchForm">
        @csrf
            <div class="form-group">
                <label for="searchTerm">Search by Product Name or Description:</label>
                <input type="text" class="form-control" 
                        name="searchTerm" id="searchTerm" 
                        placeholder="Enter search term">
            </div>

            <div class="column">
                <button type="submit" class="btn btn-primary" >Search</button>
                <a href="{{ route('webcam') }}" target="_blank">webcam</a>    
            </div>
            <br>
            </form>
    </div>
    
    <div class="container">
    <h4>Product Selection</h4><br>
    <form action="{{ route('outProduct') }}" method="POST">
            @csrf
    <table class="table">
        <thead>
            <tr>
            <th>-</th>
            <th>Product Name</th>               
                    <th>Product Description</th>
                    <th>Serial Number</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th>Updated At</th>
            </tr>
        </thead>

            <tbody>
            @if (isset($products) && count($products) > 0)
                @foreach ($products as $product)
                    <tr>
                        <td><input type="checkbox" name="product_ids[]" value="{{ $product->id }}"></td>
                        <td>{{ $product->productName }}</td>
                            <td>{{ $product->productDescription }}</td>
                            <td>{{ $product->productSN }}</td>
                            <td>{{ $product->productPrice }}</td>
                            <td>{{ $product->productQuantity }}</td>
                            <td>{{ $product->created_at}}</td>
                            <td>{{ $product->updated_at}}</td>
                    </tr>
                @endforeach
                
            @else
                <p>No results found.</p>
            @endif
            </tbody>
            
           
        </table>
         <button type="submit">Add Selected Product</button>
        </form>
        
        <a href="{{ route('dashboard') }}">Back to dashboard</a>

    </div>

    <script>
          // Function to update the input field with the scanned value
        function updateInputField() {
            const scannedSerialCode = localStorage.getItem('scannedSerialCode');
            if (scannedSerialCode) {
                document.querySelector('input[name="searchTerm"]').value = scannedSerialCode;
                localStorage.removeItem('scannedSerialCode');
            }
        }

        // Initially update the input field
        updateInputField();

        // Listen for changes in local storage and update the input field when changes occur
        window.addEventListener('storage', function (e) {
            if (e.key === 'scannedSerialCode') {
                updateInputField();
            }
        });
    </script>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
        crossorigin="anonymous">
</script>


</html>
