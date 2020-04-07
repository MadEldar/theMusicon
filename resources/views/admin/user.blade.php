<!DOCTYPE html>
<html lang="en">
@include('admin/partials/head')
@php
use App\User;
@endphp
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
                                <h4 class="card-title">Artist table</h4>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Verified at</th>
                                        <th>Created date</th>
                                        <th>Last edited</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td data-target="id">{{ $user->id }}</td>
                                            <td data-target="first_name">{{ $user->first_name }}</td>
                                            <td data-target="last_name">{{ $user->last_name }}</td>
                                            <td data-target="user_email">{{ $user->user_email }}</td>
                                            <td data-target="user_status">{{ User::status[$user->user_status] }}</td>
                                            <td>{{ $user->email_verified_at ?? 'Not verified' }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-edit-user"><i class="mdi mdi-pencil"></i></a>
                                                |
                                                <a href="#"><i class="mdi mdi-delete-forever"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->

            <div class="modal fade" id="modal-edit-user">
                <div class="modal-dialog modal-xl">
                    <form class="modal-content" action="{{ url('/administrator/users/edit') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Edit user</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-6 pl-0 float-left">
                                <label>First name</label>
                                <input name="first_name" class="form-control" placeholder="Enter first name">
                            </div>
                            <div class="form-group col-6 pr-0 float-left">
                                <label>Last name</label>
                                <input name="last_name" class="form-control" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label>User email</label>
                                <input name="user_email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>User status</label>
                                <select name="user_status" class="form-control">
                                    @foreach(User::status as $key=>$status)
                                        <option value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="id">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal fade" id="modal-delete-user">
                <div class="modal-dialog modal-lg">
                    <form class="modal-content" action="{{ url('/administrator/users/delete') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Delete product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this user?
                            <input type="hidden" name="id">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

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
