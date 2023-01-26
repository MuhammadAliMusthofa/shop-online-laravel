<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
   
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

        <!-- main-panel start -->
        @include('admin.mainpanel')
        <!-- main-panel ends -->

      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <!-- javascript -->
    @include('admin.script')
    <!-- javascript -->
  </body>
</html>