@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Article</div>

                <div class="card-body">
                    <span for="key">Current Data: <b>{{ $count }}</b></span>
                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-end">Add Data</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('save') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title" style="color: red">*Title</label>
                                            <input type="text" name="title" class="form-control">
                                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                        </div>

                                        <div class="form-group">
                                            <label for="type" style="color: red">*Type</label>
                                            <input type="text" name="type" class="form-control">
                                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                        </div>

                                        <div class="form-group">
                                            <label for="type" style="color: red">*Content</label>
                                            <br>
                                            {{-- <input type="text" name="content" class="form-control"> --}}
                                            <textarea name="content" cols="55" rows="5"></textarea>
                                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('find') }}">
                        {{-- @csrf --}}
                        <div class="form-group">
                          <label for="key">Key</label>
                          <input type="text" name="key" class="form-control"  placeholder="Input Key">
                        {{-- </br> --}}
                        </div>

                        <button type="submit" class="btn btn-primary">Find</button>
                    </form>

                    <br>
                    <div class="card-body">
                        {{-- <b>{{ count($data) }}</b> data has been filtered --}}

                        <table class="table">
                         <thead>
                           <tr>
                             <th scope="col">#</th>
                             <th scope="col">Title</th>
                             <th scope="col">Type</th>
                             <th scope="col">Content</th>
                             <th></th>
                           </tr>
                         </thead>
                         <tbody>
                          @foreach ($data as $i)
                          <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $i->title }}</td>
                             <td>{{ $i->type }}</td>
                             <td>{{ $i->content }}</td>
                             <td>
                                <a href="#" class="btn-edit" data-id="{{ $i->id }}" data-title="{{ $i->title }}" data-type={{ $i->type }} data-content="{{ $i->content }}">
                                    <button type="button" class="btn btn-sm btn-warning text-white">Edit</button>
                                </a>

                                <a href="{{ route('delete', ['id' => $i->id]) }}">
                                    <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                </a>
                             </td>
                          </tr>

                          @endforeach
                         </tbody>
                       </table>

                     </div>


                 <!-- Modal Edit-->
                 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="editModal">Edit Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('update') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="data_id">
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="title" style="color: red">*Title</label>
                                        <input type="text" name="title_edit" class="form-control">
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="type" style="color: red">*Type</label>
                                        <input type="text" name="type_edit" class="form-control">
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="type" style="color: red">*Content</label>
                                        <br>
                                        {{-- <input type="text" name="content_edit" class="form-control"> --}}
                                        <textarea name="content_edit" cols="55" rows="5"></textarea>
                                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // $("#editModal").on("show.bs.modal", function(e) {
        //     var nama = $(e.relatedTarget).data('target-id');
        //     $('#pass_id').val(nama);
        // });
        $('.btn-edit').click(function() {
            var data_id = $(this).attr('data-id');
            var data_title = $(this).attr('data-title');
            var data_type = $(this).attr('data-type');
            var data_content = $(this).attr('data-content');
            $('[name="data_id"]').val(data_id)
            $('[name="title_edit"]').val(data_title)
            $('[name="type_edit"]').val(data_type)
            $('[name="content_edit"]').val(data_content)

            $('#editModal').modal('show');
        })
    });
</script>
