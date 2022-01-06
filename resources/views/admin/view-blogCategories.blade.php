@extends('./layout/adminlayout')
@section('admin_title','All Blog Categories')
@section('container')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(Session::has('warning'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('warning') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">All Categories</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td><?php if ($list->status == 1) {
                                            echo "<span class='text-success'>Active</span>";
                                        } else {
                                            echo "<span class='text-danger'>Inactive</span>";
                                        } ?></td>
                                    <td><a href="{{ url('/admin/edit-blog-category/'.$list->id) }}" class="text-decoration-none text-dark"><i class="far fa-edit"></i></a> / <a class="addAttr text-decoration-none text-dark" data-toggle="modal" data-id='{{ $list->id }}' data-target="#delete"><i class="far fa-trash-alt"></i></a>
                                        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Delete Item?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('delete-blog-category') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <input type="hidden" id="del_id" name="id">
                                                            <span class="text-dark">Are you sure you want to delete this category?</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                @if(count($categories) == 0)
                <div class="jumbotron">
                    <h1 class="display-4"><span class="text-danger">Oops,</span> No Categories Available!</h1>
                    <p class="lead"><span class="text-primary font-weight-bolder">Want to add some categories?</span></p>
                    <hr class="my-4">
                    <a class="btn btn-dark" href="{{ route('add-blog-category') }}" role="button">Add Categories</a>
                </div>
                @endif
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection