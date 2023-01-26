<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
   
    <style>
        .div-center{
            text-align: center;
            padding-top: 40px;
        }

        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text-color{
            color:black;
        }

        label{
            display: inline-block;
            width: 200px;
        }
        
        .div_design{
            padding-bottom: 10px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_navbar.html -->
          @include('admin.navbar')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div-center">
                    @if(session()->has('messageAdd'))

                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('messageAdd')}}
                        </div>
                    @endif
                    
                    <h1 class="font_size">Add Product</h1>
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="title">Product Title :</label>
                            <input type="text" class="text-color" id="title" name="title" placeholder="write the product title" required>
                        </div>
                        <div class="div_design">
                            <label for="description">Product Description :</label>
                            <input type="text" class="text-color" id="description" name="description" placeholder="write the product description" required>
                        </div>
                        <div class="div_design">
                            <label for="price">Price :</label>
                            <input type="number" class="text-color" id="price" name="price" placeholder="write the product price" required>
                        </div>
                        <div class="div_design">
                            <label for="discount_price">Discount Price :</label>
                            <input type="number" class="text-color" id="discount_price" name="discount_price" placeholder=" discount_price is apply">
                        </div>
                        <div class="div_design">
                            <label for="catagory">Product Catagory :</label>
                            <select name="catagory" id="catagory" class="text-color" required>
                                <option value="" selected>Choose catagory </option>
                                @foreach ($catagory as $catagory )
                                     <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="quantity">Product Quantity :</label>
                            <input type="number" min="0" class="text-color" id="quantity" name="quantity" placeholder="write the product quantity" required>
                        </div>
                        <div class="div_design">
                            <label for="image">Product Image :</label>
                            <input type="file" class="text-color" id="image" name="image" placeholder="input the product image" required>
                        </div>
                        <div class="div_design">
                            <input type="Submit" class="btn btn-primary" value="Add Product">
                        </div>
                    </form>
                
                    
                </div>

            </div>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <!-- javascript -->
    @include('admin.script')
    <!-- javascript -->
  </body>
</html>