@extends('layouts.app')

@section('content')
        
        
            <div class="panel panel-default">
                <div class="panel-heading">
                	<img src="{{$d->user->avatar}}" alt="" width="50px"height="50px">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                	<span>{{$d->user->name}}, <b>{{$d->created_at->diffForHumans()}}</b>
                    <b>({{$d->user->points}} - Points)</b>

                    @if($d->hasBestAnswer())
                      <span class="btn btn-pull-right btn-success btn-xs">
                      CLOSED
                      </span>
                    @else
                    <span class="btn btn-pull-right btn-danger btn-xs">
                      OPEN
                    </span>
                    @endif
                        
                    </span>
                    @if(Auth::id()== $d->user->id)
                    <a href="{{route('discussion.edit',['slug'=>$d->slug])}}" class="btn btn-info pull-right btn-xs"style="margin-right: 8px;">Edit</a>
                    @endif
                	@if($d->is_being_watched_by_auth_user())   
                        <a href="{{route('discussion.unwatch',['id'=>$d->id])}}" class="btn btn-default pull-right btn-xs" style="margin-right: 8px;">unWatch</a>
                    @else 
                        <a href="{{route('discussion.watch',['id'=>$d->id])}}" class="btn btn-default pull-right btn-xs"style="margin-right: 8px;">Watch</a>
                    @endif
                </div>

                <div class="panel-body">
                	<h3 class="text-center"><b>{{$d->title}}</b> </h3>
                	<hr>
                   	<p class="">
                   		{{$d->content}}
                   	</p>
                    <hr>
                    @if($best_answer)
                    <div class="text-center" style="padding:40px;">
                        <h3 class="text-center">Best Answer</h3>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <img src="{{$best_answer->user->avatar}}" alt="" width="50px"height="50px">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <span>{{$best_answer->user->name}}
                                <b>({{$best_answer->user->points}} - Points)</b>
                                </span>
                            </div>
                            <div class="panel-body">
                                {{$best_answer->content}}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="panel-footer">
                    <span>
                        {{$d->replies->count()}} Replies
                    </span>
                  <a href="{{route('channel',['slug'=>$d->channel->slug])}}" class="pull-right btn btn-default btn-xs">
                    {{$d->channel->title}}
                  </a>
                </div>
            </div>

            @foreach($d->replies as $r )
				<div class="panel panel-default">
                <div class="panel-heading">
                	<img src="{{$r->user->avatar}}" alt="" width="50px"height="50px">&nbsp;&nbsp;&nbsp;&nbsp;
                	<span>{{$r->user->name}}, 
                        <b>{{$r->created_at->diffForHumans()}}</b>
                        <b>({{$r->user->points}} - Points)</b>
                    </span>
                    @if(!$best_answer)
                        @if(Auth::id() == $d->user->id)
                        <a href="{{route('discussion.best.answer',['id'=> $r->id])}}" class="btn btn-xs btn-info pull-right">Mark as Best answer</a>
                        @endif
                    @endif
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
                    @if(Auth::check())
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
                    @else
                        <div class="text-center">
                            <h2>Sign in to Leave a Reply</h2>
                        </div>
                    @endif
            	</div>
            </div>
        
        
@endsection
