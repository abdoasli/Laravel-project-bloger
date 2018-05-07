@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Post</div>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>                       
                    </div>
                @endif
                <div class="panel-body">
                    <form action="/post" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input max="25" id="title" class="form-control" required="" type="text" name="title" placeholder="title">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required="">
                                <option>first</option>
                                <option>second</option>
                                <option>third</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input max="25" id="image" class="form-control" type="file" name="image" placeholder="image">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea rows="7" class="form-control" id="content" required="" placeholder="content" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-primary" type="submit">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
