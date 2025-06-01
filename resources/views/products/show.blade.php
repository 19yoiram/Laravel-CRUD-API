@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        <div class="card-header"><h4>Product Show</h4></div>
        <div class="card-body">
            <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-3">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            <div id="productDetailContainer" class="mt-4">
             
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function () {
            const productId = "{{ $product->id }}"; 
            const token = localStorage.getItem('token');

            $.ajax({
                url: `/api/auth/products/${productId}`,
                type: 'GET',
                headers: {
                    "Authorization": `Bearer ${token}`
                },
                success: function (response) {
                    console.log(response.data.products);
                var product = response.data.products[0];
                  
         const html =` <p><strong>Name:</strong> ${product.name}</p>
                        <p><strong>Detail:</strong> ${product.detail}</p>
                        <p><strong>Image:</strong>
                            <img style="width: 150px;" src="/uploads/images/${product.image}" alt="">
                        </p>`;
                    $('#productDetailContainer').html(html);
                },
                 error: function (xhr, status, error) {
                alert('Error: ' + xhr.responseText);
            }
            });
        });
    </script>
@endsection
