
 @extends('layouts.master')
 @section('form')
     

<body>
  
    

    <form method="POST" action="/test" class="mx-5" id="updateForm">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="name">name:</label>
                <input type="text" name="name" required class="form-control" placeholder="samosa">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
                <div class="col-md-6">
                    <label for="Active">Active:</label>
                    <select name="active" required class="form-control">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="description">description:</label>
                <textarea name="description" required class="form-control" placeholder="tasty samosa"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="Brand">Brand:</label>
                <select name="Brand" required class="form-control">
                    <option value="">Select a brand</option>
                    <option value="Electronics">NIKE</option>
                    <option value="Clothing">desi Rasoi</option>
                    <option value="Home">Maharaja</option>
                    <option value="Sports">Raymond</option>
                    <option value="Books">Logitech</option>
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="sku">sku:</label>
                <input type="string" name="sku" required class="form-control" placeholder="58">
                @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="category">Category:</label>
                <select name="category" required class="form-control">
                    <option value="">Select a category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Home">Home</option>
                    <option value="Sports">Sports</option>
                    <option value="Books">Books</option>
                </select>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="instockQuantity">instock_Quantity:</label>
                <input type="number" name="instock_Quantity" class="form-control" placeholder="44.00">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="regularprice">regularprice:</label>
                <input type="number" name="regularprice" required class="form-control" placeholder="50.00">
                @error('regularprice')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="saleprice">saleprice:</label>
                <input type="number" name="saleprice" required class="form-control"  placeholder="80.00">
                @error('saleprice')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="">Update Feature Image</label>
                    <input type="file" name="image" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="Tax96">Tax96:</label>
                <input type="number" name="Tax96" required class="form-control" placeholder="0.00">
            </div>

            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="">Add More Images</label>
                    <input type="file" name="image" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div>
        </div>    
        <div class="row mt-3">
            <div class="col-md-6">
                <button id="cancelButton" type="button" class="btn btn-secondary">Cancel</button>
            </div>
            <div class="col-md-6 text-end">
                <input id="updateButton" type="submit" class="btn btn-primary" value="Update">
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Handle cancel button click event
                $('#cancelButton').click(function() {
                    // Redirect the user to a specific page
                    window.location.href = '/form';

                    // Or clear the form fields
                    $('#formId')[0].reset();
                });
            });
        </script>
    </form>
   
    @endsection