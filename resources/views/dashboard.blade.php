<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
                <h4>Dashboard</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Welcome {{$dataUser->name}}</h5>
                        </div>

                        <div class="col-md-6">
                            <a href="addProduct">Add Products</a>
                            <a href="outProduct">Out Products</a>
                            <a href="{{ route('search') }}">Search</a> 
                            <a href="logout">Logout</a>
                        </div>
                    </div>

                <hr>   
                
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Serial Number</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Created At</th>
                                    <th>Last Update</th>
                                    <th>Action</th>
                                </tr>    
                            </thead>
                            <tbody>
                                <tr>
                                @foreach($dataProducts as $data)
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->productName}}</td>
                                    <td>{{$data->productDescription}}</td>
                                    <td>{{$data->productSN}}</td>
                                    <td>{{$data->productPrice}}</td>
                                    <td>{{$data->productQuantity}}</td>
                                    <td>{{$data->created_at->format('Y-m-d H:i:s')}}</td>
                                    <td>{{$data->updated_at->format('Y-m-d H:i:s')}}</td>
                                    <td>
                                        <a href="{{route('product.edit', ['id' => $data->id])}}">Edit</a>
                                        <a href="{{route('product.remove', ['id' => $data->id])}}"
                                        onclick="return confirm('Are you sure you want to delete this product?')">delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>    
                        </table>
                    </div>
        
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
        crossorigin="anonymous">

</script>
</html>