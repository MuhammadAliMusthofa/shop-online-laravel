<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
   <style>
    .div_center{
        text-align: center;
        padding-top: 40px;
    }

    .h2_font{
        font-size: 40px;
        padding-bottom: 40px;
    }

    .input_color{
        color:black
    }

    .tbl-style{
        margin:auto;
        border:3px solid yellow;
        margin-top: 30px;
        width:50%;
        text-align: center;
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
                
                @if(session()->has('messageAdd'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('messageAdd')}}
                </div>

                @elseif(session()->has('messageDelete'))

                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('messageDelete')}}
                </div>

                @endif

                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="catagory_name" placeholder="write catagory name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                    </form>
                </div>

                <table class="tbl-style">
    
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->catagory_name}}</td>
                        <td><a onclick="return confirm('are you sure to delete this data?')" class="btn btn-danger" href="{{url('delete_catagory', $data->id)}}">Delete</a></td>
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