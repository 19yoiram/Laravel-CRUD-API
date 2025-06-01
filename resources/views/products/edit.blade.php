@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h4>Product Edit</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-3"> <i class="fa fa-arrow-left"></i> Back</a>
            <form id="updateProductForm" >
                @csrf
                @method('PUT')

                <div class="mt-2">
                    <label for="Name">Name:</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{ $product->name }}"
                        placeholder="Product Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="Image">Image:</label>
                    <input id="image" type="file" class="form-control" name="image">
                    <img style="width: 150px;" src="{{ asset('uploads/images/' . $product->image) }}" alt="">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="Detail">Detail:</label>
                    <textarea id="detail" name="detail" placeholder="Product Detail" class="form-control" id="" cols="30" rows="5">{{ $product->detail }}</textarea>
                    @error('detail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <button class="btn btn-success btn-sm" type="submit" name="submit"><i class="fa fa-save"></i>
                        Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            const productId = "{{ $product->id }}";
            const token = localStorage.getItem('token');

            $('#updateProductForm').on('submit', function(event) {
                event.preventDefault();

                const name = $("#name").val();
                const detail = $("#detail").val();
                if($("#image")[0].files[0]==""){
                const image = $("#image")[0].files[0];
                }
               

                const formData = new FormData();
                formData.append('name', name);
                formData.append('detail', detail);
                if($("#image")[0].files[0]==""){
                formData.append('image', image); 
                }

                $.ajax({
                    url: `/api/auth/products/${productId}`,
                    type: 'POST', 
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        window.location.href = "{{ route('products.index') }}";
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error: " + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
