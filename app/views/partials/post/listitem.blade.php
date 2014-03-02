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
		 نشر في <a class="post_category" href="{{$post->getRouteToCommunity()}}">{{$post->community()->name}}</a> بواسطة <a class="post_user" href="/u/abarbod"> {{$post->user()->username}} </a><span class="post_date">{{$post->getCreationDateDiffForHumans()}}</span> | <span class="post_favorite" id="fp-5154"><a class="remove_favorite hidden" href="#"><i class="icon-star"></i> أزل من المفضّلة</a><a class="add_favorite " href="#">أضف الى المفضّلة</a></span> | <span class="post_comments"><a href="/general/5154-%D8%AE%D8%B7%D9%88%D8%B1%D8%A9-%D9%85%D9%88%D8%A7%D9%82%D8%B9-%D8%B2%D9%8A%D8%A7%D8%AF%D8%A9-%D8%A7%D9%84%D9%85%D8%AA%D8%A7%D8%A8%D8%B9%D9%8A%D9%86-%D9%88-%D8%A7%D9%84%D8%A7%D8%B9%D8%AC%D8%A7%D8%A8%D8%A7%D8%AA-exa-te4m-youtube" class="strong">ابدأ النقاش</a></span>
	</div>
</div>