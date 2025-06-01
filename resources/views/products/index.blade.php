@extends('layouts.app')

@section('content')

    <div class="card mt-5">
        <div class="card-header">
            <h4>Product List</h4>
        </div>
        <div class="card-body">

            @session('success')
                <div class="alert alert-success">{{ $value }}</div>
            @endsession

            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm mb-3"> <i class="fa fa-plus"></i> Create
                Product</a>
                @session('Success')
                <div class="alert alert-success">{{$value}}</div>
                @endsession
            <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="row g-2 align-items-end">
                            <div class="col">
                                <label for="file" class="form-label">Choose File:</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success">Import</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end align-items-end mt-3 mt-md-0">
                        <a href="{{route('products.export')}}" class="btn btn-primary">Export</a>
                    </div>
                </div>
            </form>

            <div id="productsContainer">

            </div>
            <a id="logoutButton" class="btn btn-danger btn-sm">Log out</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $("#logoutButton").on('click', function(event) {
                event.preventDefault();
                const token = localStorage.getItem('token');

                $.ajax({
                    url: '/api/auth/logout',
                    type: 'POST',
                    headers: {
                        "Authorization": `Bearer ${token}`
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.href = "{{ route('account.login') }}";
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function loadData() {
                const token = localStorage.getItem('token');

                $.ajax({
                    url: '/api/auth/products',
                    type: 'GET',
                    headers: {
                        "Authorization": `Bearer ${token}`
                    },
                    success: function(response) {
                        console.log(response.data.products);
                        var allProduct = response.data.products;
                        const productContainer = $("#productsContainer");

                        var tableData = `<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width=50px>ID</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Image</th>
                            <th width=250px>Action</th>
                        </tr>
                    </thead>
                    <tbody>`;

                        allProduct.forEach(product => {
                            tableData += `<tr>
                        <td>${product.id}</td>
                        <td>${product.name}</td>
                        <td>${product.detail}</td>
                        <td><img style="width: 150px;" src="${product.image}" alt=""></td>
                        <td>
                            <form action="/products/${product.id}" method="POST">
                                @csrf
                                <a href="/products/${product.id}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <a href="/products/${product.id}/edit" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>  
                                @method('DELETE')
                                <button onclick="deleteProduct(${product.id})" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>`;
                        });

                        tableData += `</tbody></table>`;
                        productContainer.html(tableData);
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            }

            loadData();
        });
    </script>

    <script>
        function deleteProduct(productId) {
            const token = localStorage.getItem('token');

            $.ajax({
                url: `/api/auth/products/${productId}`,
                type: 'DELETE',
                headers: {
                    "Authorization": `Bearer ${token}`
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = "{{ route('products.index') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Error: " + xhr.responseText);
                }
            });
        }
    </script>


@endsection
