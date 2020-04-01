<!DOCTYPE html>
<html lang="en">
@include('admin/partials/head')
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('admin/partials/navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
    @include('admin/partials/sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <div class="row" id="proBanner">
                          <div class="col-12">
                    <span class="d-flex align-items-center purchase-popup">
{{--                      <p>Click here to find artist</p>--}}
{{--                      <a href="https://github.com/BootstrapDash/PurpleAdmin-Free-Admin-Template" target="_blank"--}}
{{--                         class="btn ml-auto download-button">Download Free Version</a>--}}
                      <a href="https://www.bootstrapdash.com/product/purple-bootstrap-4-admin-template/" target="_blank"
                         class="btn ml-auto purchase-button">Find Artist</a>
{{--                      <i class="mdi mdi-close" id="bannerClose"></i>--}}
                    </span>
                          </div>
                      </div>
                    <h4 class="card-title">Artist table</h4>
                    </p>
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Name </th>
                          <th> Description</th>
                          <th> Thumbnail </th>
                          <th> Start </th>
                          <th> End </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> 1 </td>
                          <td><img src="{{url('https://picsum.photos/50/50')}}}" style="width: 25px; height: 25px"> Herman Beck </td>
                          <td> Herman Beck </td>
                          <td> $ 77.99 </td>
                          <td> May 15, 2015 </td>
                          <td> May 15, 2015 </td>
                          <td> <i class="mdi mdi-delete-forever"></i> | <i class="mdi mdi-pencil"></i></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->

            <!-- partial:partials/_footer.html -->
        @include('admin/partials/footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('admin/partials/scripts')
<!-- Custom js for this page -->
<script src="{{ asset('admin/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/js/todolist.js') }}"></script>
<!-- End custom js for this page -->
  </body>
</html>
