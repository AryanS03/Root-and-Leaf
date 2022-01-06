@extends('./layout/adminlayout')
@section('admin_title','Manage Product')
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
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ url('/admin/update-product/'.$product->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="title">Enter Product Title</label>
                                                <input type="text" value="{{ $product->title }}" name="title" class="form-control" id="title" placeholder="Enter Product Title">
                                                @if($errors->first('title'))
                                                <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('title') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="short-desc">Enter Short Description</label>
                                                <input type="text" value="{{ $product->short_description }}" name="short_description" class="form-control" id="short-desc" placeholder="Enter short description">
                                                @if($errors->first('short_description'))
                                                <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('short_description') }}</p>
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
                                                        <option value="{{ $category->id }}" <?php if ($product->category_id == $category->id) {
                                                                                                echo "selected";
                                                                                            } ?>>{{ $category->name }}</option>
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
                                                <label for="subcategory">Choose Sub Category</label>
                                                <div class="input-group">
                                                    <select class="custom-select" id="subcategory" name="subcategory">
                                                        <option value="{{ $product->subcategory_id }}" hidden>{{ $product->subcategory['name'] }}</option>
                                                    </select>
                                                </div>
                                                @if($errors->first('subcategory'))
                                                <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('subcategory') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price">Enter Price</label>
                                                <input type="text" name="price" class="form-control" value="{{ $product->price }}" id="price" placeholder="Enter price">
                                                @if($errors->first('price'))
                                                <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('price') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <div class="input-group">
                                                    <select class="custom-select" id="status" name="status">
                                                        <option value="{{ $product->status }}" @if($product->status == 1){{'selected'}} @endif>Active</option>
                                                        <option value="0" @if($product->status == 0){{'selected'}} @endif>Inactive</option>
                                                    </select>
                                                </div>
                                                @if($errors->first('status'))
                                                <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('status') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="addImages">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="images">Add Another Images</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="" name="images[]" id="images" multiple>
                                                        @if($errors->first('images'))
                                                        <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('images') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Cover Image</label>
                                        <div><img src="{{ asset('/storage/product_images/'.$product->image) }}" class="img-fluid" alt=""></div>
                                        <div class="input-group mt-3">
                                            <div class="custom-file">
                                                <input type="file" class="" name="image" id="image">
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
                                        <textarea name="description" class="textarea" id="textarea" rows="3">{{ $product->description }}</textarea>
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
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="image">Images</label>
                    <div class="row">
                        @foreach($productImages as $list)
                        <div class="col-md-4">
                            <div class="card" style="box-shadow: none !important;">
                                <img src="{{ asset('/storage/product_images/'.$list->image) }}" class="card-img-top" alt="...">
                                <div class="card-body p-0 pt-4">
                                    <form action="{{ url('/admin/remove-product-image/'.$list->id) }}">
                                        <input type="submit" value="Remove" class="btn btn-sm btn-danger">
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if(count($productImages) == 0)
                <div class="jumbotron">
                    <h1 class="display-4"><span class="text-danger">Oops,</span> No Images Available!</h1>
                    <p class="lead"><span class="text-primary font-weight-bolder">Want to add some Images?</span></p>
                    <hr class="my-4">
                    <button class="btn btn-dark" id="click" role="button">Click here</button>
                </div>
                @endif
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection