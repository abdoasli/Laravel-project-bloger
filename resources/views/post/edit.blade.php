@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Post</div>

                <div class="panel-body">
                    <form action="/post/{{$post->id}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{$post->title}}" id="title" class="form-control" required="" type="text" name="title" placeholder="title">
                        </div>
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required="">
                                <option{{($post->category=='first')?' selected':''}}>first</option>
                                <option{{($post->category=='second')?' selected':''}}>second</option>
                                <option{{($post->category=='third')?' selected':''}}>third</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea rows="7" class="form-control" id="content" required="" placeholder="content" name="content">{{$post->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

