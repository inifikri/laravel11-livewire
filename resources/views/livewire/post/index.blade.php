<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-4">
                    <button type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal"
                        data-target="#modal-default"><i class="fas fa-plus"></i> Add</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3 class="card-title mt-1">Table Post Data</h3>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group float-right">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-sm bg-gradient-primary"><i
                                                    class="fas fa-search"></i> Search</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->content }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs bg-gradient-primary"
                                                        data-toggle="modal" data-target="#modal-default"><i
                                                            class="fas fa-pencil-alt"></i></button>
                                                    <button type="button" class="btn btn-xs bg-gradient-danger"
                                                        data-toggle="modal" data-target="#modal-default"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default</h4>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" wire:model="title" class="form-control" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Content</label>
                            <input type="text" wire:model="content" class="form-control" placeholder="Content">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-sm bg-gradient-primary float-right"><i
                                class="fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
