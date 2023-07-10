@extends('admin.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="editblogcommentFrom" id="editblogcommentFrom">
                    <div class="card">
                        <div class="card-header">{{ __('blogs Comment Edit') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.blog.comment') }}" role="button">Back</a>
                                </div>
                                <div class="col-md-8"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Name</label>
                                <input value="{{ $blogcomment->name }}" type="text" name="name" id="name" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error name-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">comment</label>
                                <textarea name="comment" id="comment" class="form-control" cols="30" rows="10">{{ $blogcomment->comment }}</textarea>

                                <p class="text-danger error comment-error"></p>

                            </div>
                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ ($blogcomment->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($blogcomment->status == 0) ? 'selected' : '' }}>Block</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('extraJs')
    <script type="text/javascript">

        $("#editblogcommentFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route("admin.blog.comment.update",$blogcomment->blog_comments_id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#editblogcommentFrom").serializeArray(),
                success: function(response) {

                    // window.location.href = '{{ route("admin.blog.index") }}';

                    if (response.status == 200) {

                        //location.replace('/admin/blogs/list');


                    } else {
                        $('.name-error').html(response.errors.name);
                        $('.comment-error').html(response.errors.comment);

                    }
                }
            });

        });
    </script>
@endsection
