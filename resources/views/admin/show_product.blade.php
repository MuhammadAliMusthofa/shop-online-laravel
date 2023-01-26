<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    
    @include('admin.css')
   <style>
    .tbl-center{
        margin: auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .font_size{
            font-size: 40px;
            padding-top: 20px;
            text-align: center;
        }

    .img-size{
        width: 150px;
        height: 150px;
    }

    .thead{
        padding:30px;
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

                @if(session()->has('messageUpdate'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('messageUpdate')}}
                </div>

                @elseif(session()->has('messageDelete'))

                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('messageDelete')}}
                </div>

                @endif

                <h2 class="font_size">All Products</h2>
                <table  class="tbl-center">
                    <tr class="bg-info">
                        <th class="thead">Product Title</th>
                        <th class="thead">Description</th>
                        <th class="thead">Catagory</th>
                        <th class="thead">Price</th>
                        <th class="thead">Discount</th>
                        <th class="thead">Quantity</th>
                        <th class="thead">Product Image</th>
                        <th class="thead">Edit</th>
                        <th class="thead">Delete</th>


                    </tr>

                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->catagory}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->discount_price}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>
                           <img class="img-size" src="/product/{{$data->image}}" alt=""> 
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{url('update_product',$data->id)}}">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('are you sure to delete this data?')" class="btn btn-danger" href="{{url('delete_product',$data->id)}}">Delete</a>
                        </td>
                        
                    </tr>
                        
                    @endforeach
                </table>
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