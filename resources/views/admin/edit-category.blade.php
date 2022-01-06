@extends('./layout/adminlayout')
@section('admin_title','Manage Category')
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
                  <h3 class="card-title">Edit Category</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="{{ url('/admin/update-category/'.$category[0]->id) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-8">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="category">Enter Category Name</label>
                                    <input type="text" value="{{$category[0]->name}}" name="name" class="form-control" id="category" placeholder="Enter category name">
                                    @if($errors->first('category'))
                                    <p class="mt-2 text-danger font-weight-bold">{{ $errors->first('category') }}</p>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <label for="slug">Parent Category</label>
                                 <div class="form-group">
                                    <div class="input-group">
                                       <select class="custom-select" id="status" name="parent_id">
                                          <option value="0">Parent Category</option>
                                          @foreach($categories as $list)
                                          <option value="{{ $list->id }}" <?php if ($category[0]->parent_id == $list->id) echo "selected"; ?>>{{ $list->name }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    @if($errors->first('status'))
                                    <p class="text-danger font-weight-bold">{{ $errors->first('status') }}</p>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="image">Choose Image</label>
                                    <div class="input-group mb-2">
                                       <input type="file" name="image" id="image">
                                    </div>
                                    @if($errors->first('image'))
                                    <p class="text-danger font-weight-bold">{{ $errors->first('image') }}</p>
                                    @endif
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group">
                                       <select class="custom-select" id="status" name="status">
                                          <option value="1" <?php if ($category[0]->status == 1) {
                                             echo "selected";
                                             } ?>>Active</option>
                                          <option value="0" <?php if ($category[0]->status == 0) {
                                             echo "selected";
                                             } ?>>Inactive</option>
                                       </select>
                                    </div>
                                    @if($errors->first('status'))
                                    <p class="text-danger font-weight-bold">{{ $errors->first('status') }}</p>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <img src="{{ asset('/storage/category_images/'.$category[0]->image) }}" class="img-fluid" alt="">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <input type="submit" class="btn btn-success" value="Update">
                  </div>
               </form>
            </div>
            <!-- /.card -->
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection