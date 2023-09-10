<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Add Product Page</h1>
        <hr>
        <form action="{{ route('add-product') }}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
            @endif
            @csrf
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" 
                       placeholder="Enter Product Name"
                       name="productName" value="{{ old('productName') }}">  
                <span class="text-danger">@error('productName') {{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description</label>
                <input type="text" class="form-control" 
                       placeholder="Enter Product Description"
                       name="productDescription" value="{{ old('productDescription') }}">  
                <span class="text-danger">@error('productDescription') {{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="productSN">Serial Number <a href="{{ route('webcam') }}" target="_blank">Webcam</a></label>
                <input type="text" class="form-control" 
                       placeholder="Enter Serial Number"
                       name="productSN" value="{{ old('productSN') }}"> 
                <span class="text-danger">@error('productSN') {{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input type="text" class="form-control" 
                       placeholder="Enter Product Price"
                       name="productPrice" value="{{ old('productPrice') }}">  
                <span class="text-danger">@error('productPrice') {{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="productQuantity">Product Quantity</label>
                <input type="text" class="form-control" 
                       placeholder="Enter Product Quantity"
                       name="productQuantity" value="{{ old('productQuantity') }}">  
                <span class="text-danger">@error('productQuantity') {{ $message }}@enderror</span>
            </div>
            <button class="btn btn-block btn-primary" type="submit">Add a product</button>
            <br>
            <a href="dashboard">Back to dashboard</a>
        </form>
    </div>
    
    <script>
        // Function to update the input field with the scanned value
        function updateInputField() {
            const scannedSerialCode = localStorage.getItem('scannedSerialCode');
            if (scannedSerialCode) {
                document.querySelector('input[name="productSN"]').value = scannedSerialCode;
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