

 @extends('layouts.master')
 @section('yajra')
 <head>
     <title>Laravel </title>
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
     <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
     <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 </head>
 <body>
    
 <div class="container mt-5">
     <h2 class="mb-4">Yajra Datatables </h2>
     <table class="table table-bordered yajra-datatable">
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Name</th>
                 <th>Description</th>
                 <th>SKU</th>
                 <th>regularprice</th>
                 <th>saleprice</th>
                 <th>Brand</th>
                 <th>active</th>
                 <th>action</th>
             </tr>
         </thead>
         <tbody>
         </tbody>
     </table>
 </div>
   
 </body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
 <script type="text/javascript">
  $(function () {
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('get.product') }}",
        columns: [
           { data: 'id', name: 'id' },
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'sku', name: 'sku'},
            {data: 'regularprice', name: 'regularprice'},
            {data: 'saleprice', name: 'saleprice'},
            {data: 'Brand', name: 'Brand'},
            {data: 'Active', name: 'Active'},
            
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

         // Edit product
     $('body').on('click', '.edit', function () {
            var id = $(this).data("id");
            window.location.href = "{{ url('products') }}" +  "/edit" + "/" + id;
        });

        // Delete
       // Delete record
       $('body').on('click','.delete',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                 // AJAX request
                 $.ajax({
                  
                    url: "{{ url('products/delete') }}/" + id,
                    
                     type: 'post',
                     data: {_token: CSRF_TOKEN,id: id},
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");

                               // Reload DataTable
                               body.ajax.reload();
                          }else{
                                alert("Invalid ID.");
                          }
                     }
                 });
            }

       });
});
          
    </script>

 @endsection