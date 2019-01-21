@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">
                	<img src="{{$d->user->avatar}}" alt="" width="50px"height="50px">&nbsp;&nbsp;&nbsp;&nbsp;
                	<span>{{$d->user->name}}, <b>{{$d->created_at->diffForHumans()}}</b></span>
                	<a href="{{route('discussion',['slug'=>$d->slug])}}" class="btn btn-default pull-right"> View
                	</a>
                </div>

                <div class="panel-body">
                	<h3 class="text-center"><b>{{$d->title}}</b> </h3>
                	<hr>
                   	<p class="">
                   		{{$d->content}}
                   	</p>
                </div>
                <div class="panel-footer">
                	<p>
                		{{$d->replies->count()}} Replies
                	</p>
                </div>
            </div>

            @foreach($d->replies as $r )
				<div class="panel panel-default">
                <div class="panel-heading">
                	<img src="{{$r->user->avatar}}" alt="" width="50px"height="50px">&nbsp;&nbsp;&nbsp;&nbsp;
                	<span>{{$r->user->name}}, <b>{{$r->created_at->diffForHumans()}}</b></span>
                	
                </div>

                <div class="panel-body">
                	
                   	<p class="">
                   		{{$r->content}}
                   	</p>
                </div>
                <div class="panel-footer">
                	<p>
                		<!-- below method is created in reply.php -->
                		@if($r->is_liked_by_auth_user())

							<a href="{{route('reply.unlike',['id'=>$r->id])}}" class="btn btn-danger btn-xs">UnLike
							<span class="badge">{{$r->likes->count()}}likes</span>
							</a>
                		@else
							<a href="{{route('reply.like',['id'=>$r->id])}}" class="btn btn-success btn-xs">Like
							<span class="badge">{{$r->likes->count()}}likes</span>
							</a>
                		@endif
                	</p>
                </div>
            </div>
            @endforeach

            <div class="panel panel-default">
            	<div class="panel-body">
            		<form action="{{route('discussion.reply',['id'=>$d->id])}}"
            			method="POST">
            			{{csrf_field()}}
            			<div class="form-group">
            				<label for="reply" >Leave a Reply</label>
            				<textarea name="reply" id="reply" cols="30" rows="10" class="form-control">
            					
            				</textarea>
            			</div>
            			<div class="form-group">
            				<button class="btn pull-right" type="submit">
            					Leave a reply
            				</button>
            			</div>
            		</form>
            	</div>
            </div>
      
@endsection
