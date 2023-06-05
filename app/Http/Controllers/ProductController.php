<?php

namespace App\Http\Controllers;

 use Yajra\DataTables\Facades\DataTables;
 use Illuminate\Http\Request;
 use App\Products;
 use Validator;

 /**
  * @author Heeral Ladva

  *Class name: ProductController    
  *Create a new controller for doing operations on Product module
  */

 class ProductController extends Controller
 {  
    /**
     * Method name: index
     * @return view 'test' inside views folder which contains main page of yajra datatables
     */
    
     public function index()
     {
         info("inside index ");
         return view('test');
     }
     /**
      * Method name: store
      * This method is used for validation of data 
      * @param request $request
      */

     public function store(request $request)
     {
       
         info("inside store ");

         $product = new products();

      
         $rules = $product->rules();
 
         
         $validator = Validator::make($request->all(), $rules);
 
         if ($validator->fails()) {
             // Handle validation errors
             return redirect()->back()->withErrors($validator)->withInput();
             
         } else {
           
             $validatedData = $validator->validated();
 
             // Update the product with the validated data
             $product->name = $validatedData['name'];
             $product->description = $validatedData['description'];
             $product->sku = $validatedData['sku'];
             info($product);
             
 
             $product->save();
 
             return redirect('/test')->with('success', 'Product created successfully.');
         }
     }

     /**
      * Method name : getProduct
      * @param request to ajax
      * This methdo is used to get products data from database
      */

     public function getproduct(request $request)
    {   
         info($request);
        
         if ($request -> ajax())
         {
             $data = Products::latest()->get();

             return DataTables::of($data)
             ->addColumn('action',function($row){
                  // edit Button
                  $editbtn = '<a href="'.url('/product/edit', $row->id).'"><button class="btn btn-primary">Edit</button></a>';//                  
                 $deleteButton = "<button class='btn btn-sm btn-danger delete' data-id='".$row->id."'><i class='fa-solid fa-trash'></i>Delete</button>";
                
                return $editbtn." ".$deleteButton;
            
        })
        ->make();
       
        }}

        /**
         * Mthod name: view 
         * This method returns the index.view with all data from database
         */

        public function view()
        {
        $products = Products::all();
        info("inside view");
        $data = compact('product');
        return view('index')->with($data);
        }

        /**
         * Method name: edit
         * This method returns an edit view which contains form for editting the data
         */
    public function edit(Products $product)
        {
            info("inside edit");
            return view('edit', compact('product'));
        }

        /**
         * Method name: update
         * @param request and creates an instance of Products model
         * This method is used when edit form will submit and this will update the data from database
         */

    public function update(Request $request, Products $product)
    {
        info("inside update");
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->sku = $request->input('sku');
        $product->regularprice = $request->input('regularprice');
        $product->saleprice = $request->input('saleprice');
        $product->Brand = $request->input('Brand');

        $product->save();

        return redirect('/')->with('success', 'Product updated successfully.');

    }

    /**
     * Method name: delete
     * @param request
     * This method is used to delete a record from databaseby finding the id of particular product
     * it return the response in json
     */
    public function delete(Request $request)
    {
        info($request);
    
            $id = $request->input('id');
            $data = Products::find($id);
            
            if ($data) {
                if ($data->delete()) {
                    $response['success'] = 1;
                    $response['msg'] = 'Record deleted.';
                } else {
                    $response['success'] = 0;
                    $response['msg'] = 'Failed to delete record.';
                }
            }   else {
                $response['success'] = 0;
                $response['msg'] = 'Invalid ID.';
                }
        return response()->json($response); 
     }

     /**
      * Method name: upload
      * @param request
      * This method is used to upload an image which is selected by client
      */

     public function upload(Request $request)    
         {
             $fileName = time() . "-ws." . $request->file('image')->getClientOriginalExtension();
             echo $request->file('image')->storeAs('uploads',$fileName);
         }
         /**
          * Method name: show
          * @param request and id
          * This method will find the id of product and then see the other details of product
          * This will return the view
          */


    public function show(Request $request, $id) {
            $product = Products::find($id);
        
            if (!$product) {
               
                abort(404, 'Product not found');
            }
        
            return view('show', compact('product'));
        }
 }