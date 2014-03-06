<div id="{{$post->getDivId()}}" class="post">
	<div class="post_vote">
		<div class="post_upvote">
			<a id="post_upvote-{{$post->id}}" href="#" class="upvote_btn"><i class="fa fa-angle-up"></i></a>
		</div>
		<div class="post_points ltr">
			 {{$post->sumvotes}}
		</div>
		<div class="post_downvote ">
			<a id="post_downvote-{{$post->id}}" href="#" class="downvote_btn"><i class="fa fa-angle-down"></i></a>
		</div>
	</div>
<!--	<div style="overflow: hidden; padding: 0px; width: 50px; height: 50px;" class="post_image nailthumb-container square-thumb-s">
		<a href="https://www.youtube.com/watch?v=fOwq2t6nBiA" rel="nofollow" target="_blank"><img class="nailthumb-image" style="position: relative; width: 88.75px; height: 50px; top: 0px; left: -19.375px; display: inline;" src="/uploads/posts/5154-24-02-14-3c7b78aa1d.png"></a>
	</div>-->
	<div class="post_title">
		<h2>
                    {{$post->getTitleHTMLTag()}}
                </h2>
	</div>
	<div class="post_meta">
		 نشر في <a class="post_category" href="{{$post->getRouteToCommunity()}}">{{$post->community()->name}}</a> بواسطة <a class="post_user" href="{{route('user-index',array('username'=>$post->user()->username))}}"> {{$post->user()->username}} </a><span class="post_date">{{$post->getCreationDateDiffForHumans()}}</span> | <span class="post_favorite" id="fp-5154"><a class="remove_favorite hidden" href="#"><i class="icon-star"></i> أزل من المفضّلة</a><a class="add_favorite " href="#">أضف الى المفضّلة</a></span> | <span class="post_comments"><a href="{{$post->getRouteToPost()}}" class="strong">{{$post->getCommentsCountLiteral()}}</a></span>
	</div>
</div>