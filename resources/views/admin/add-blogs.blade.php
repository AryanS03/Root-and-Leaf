@extends('./layout/adminlayout')
@section('admin_title','Add New Blog')
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
                        <h3 class="card-title">Add New Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('submit-blog') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Enter Title</label>
                                        <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" placeholder="Enter Title">
                                        @if($errors->first('title'))
                                        <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="slug">Enter Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" id="slug" placeholder="Enter slug">
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="parent_category">Choose Category</label>
                                        <div class="input-group">
                                            <select class="custom-select" id="parent_category" name="category">
                                                <option value="" hidden>Choose..</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($errors->first('category'))
                                        <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('category') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Cover Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" name="image" id="image">
                                            </div>
                                        </div>
                                        @if($errors->first('image'))
                                        <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="textarea">Enter Description</label>
                                        <textarea name="description" class="textarea" id="textarea" rows="3">{{ old('description') }}</textarea>
                                        @if($errors->first('description'))
                                        <span class="text-danger font-weight-bold">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.col-->
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