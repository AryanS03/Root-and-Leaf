@extends('./layout/adminlayout')
@section('admin_title','Manage Blog')
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
                        <h3 class="card-title">Edit Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ url('/admin/update-blog/'.$blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Enter Title</label>
                                                <input type="text" value="{{ $blog->title }}" name="title" class="form-control" id="title" placeholder="Enter Title">
                                                @if($errors->first('title'))
                                                <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('title') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <div class="input-group">
                                                    <select class="custom-select" id="status" name="status">
                                                        <option value="" hidden>Choose..</option>
                                                        <option value="1" @if($blog->status==1){{'selected'}}@endif>Active</option>
                                                        <option value="0" @if($blog->status==0){{'selected'}}@endif>Inactive</option>
                                                    </select>
                                                </div>
                                                @if($errors->first('status'))
                                                <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('status') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="parent_category">Choose Category</label>
                                                <div class="input-group">
                                                    <select class="custom-select" id="parent_category" name="category">
                                                        <option value="" hidden>Choose..</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" @if($blog->category_id == $category->id){{'selected'}}@endif>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if($errors->first('category'))
                                                <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('category') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('/storage/blog_images/'.$blog->image) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="textarea">Enter Description</label>
                                        <textarea name="description" class="textarea" id="textarea" rows="3">{{ $blog->description }}</textarea>
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
                            <input type="submit" class="btn btn-danger" value="Update">
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
