@extends('./layout/adminlayout')
@section('admin_title','Add Blog Category')
@section('container')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('submit-blog-category') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Enter Category Name</label>
                                        <input type="text" name="category" class="form-control" id="category" placeholder="Enter category name">
                                        @if($errors->first('category'))
                                        <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('category') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="slug">Enter Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter slug">
                                        @if($errors->first('slug'))
                                        <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('slug') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div class="input-group">
                                            <select class="custom-select" id="status" name="status">
                                                <option value="" hidden>Choose..</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        @if($errors->first('status'))
                                        <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection