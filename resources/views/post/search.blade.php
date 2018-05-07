
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="post-title">{{$post->title}}</span>
                    <div class="dropdown post-more">
                      <i class="fa fa-ellipsis-h" aria-hidden="true" dropdown-toggle data-toggle="dropdown"></i>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="/post/{{$post->id}}/edit">Edit</a></li>
                        <li data-toggle="modal" data-target="#myModal{{$post->id}}"><a href="#">Delete</a></li>
                        <li><a href="#">Show</a></li>
                      </ul>
                    </div>
                </div>
                <small><i>&nbsp;&nbsp;Category: {{$post->category}}</i></small>
                <div class="panel-body">
                    {{$post->content}}
                </div>
                <small><i>&nbsp;&nbsp;Created at: {{$post->created_at}}</i></small>

                <!-- Modal -->
                <div id="myModal{{$post->id}}" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Deleting Post</h4>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure you want to delete this post <a href="#">{{$post->title}}</a>.</p>
                      </div>
                      <div class="modal-footer">
                        <form action="/post/{{$post->id}}" method="post">
                        {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>
            </div>
        @endforeach

            <div class="col-md-4 col-md-offset-4">
                <ul class="pagination">
                    @if($active>1)
                        <li onclick="submitSearchPage('{{$active-1}}')"><a href="#">«</a></li>
                    @endif
                    @for($i=$start;$i<=$end;$i++)

                        @if($active == $i)
                            <li onclick="submitSearchPage('{{$i}}')" class="active"><a href="#">{{$i}}</a></li>
                        @else
                            <li onclick="submitSearchPage('{{$i}}')"><a href="#">{{$i}}</a></li>
                        @endif

                    @endfor
                    @if($active<$n_pages)
                        <li onclick="submitSearchPage('{{$active+1}}')"><a href="#">»</a></li>
                    @endif
                </ul>
                <form id="search-form" action="/search/page/" method="post" style="display: none;">
                {{csrf_field()}}
                    <input type="hidden" name="search" value="{{request('search')}}">
                    <input type="hidden" name="category" value="{{request('category')}}">
                </form>
            </div>

        </div>
    </div>
</div>
@endsection










