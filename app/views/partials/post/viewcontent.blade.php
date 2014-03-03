<div id="post" class="page_sidebar">
	<!-- section post vote title-->
<!--	<div id="post_vote_title" class="post_vote">
		<div class="post_upvote">
			<a id="title_post_upvote-5148" href="#" class="upvote_btn"><i class="fa fa-angle-up"></i></a>
		</div>
		<div class="post_points ltr">
			{{$post->sumvotes}}
		</div>
		<div class="post_downvote">
			<a id="title_post_upvote-5148" href="#" class="downvote_btn"><i class="fa fa-angle-down"></i></a>
		</div>
	</div>-->
	<!-- end section post vote title-->
	<div id="content_nav">
		<h2 id="nav_title"><a href="{{route('post-view',['postId'=>$post->id,'postSlug'=>$post->slug])}}" title="{{$post->title}}">{{$post->title}}</a></h2>
		<div class="clear">
		</div>
	</div>
<!--	<div id="post_meta_title">
		<ul>
			<li><i class="fa fa-clock-o"></i>$post->getCreationDateDiffForHumans()</li>
			<li><i class="icon-user"></i><a href="/u/thamood">thamood</a></li>
			<li><i class="icon-reorder"></i><a href="/programming">برمجة عامة</a></li>
			<li id="title_fp-5148"><i class="icon-star"></i><a href="#" class="add_favorite ">أضف الى المفضّلة</a><a href="#" class="remove_favorite hidden">أزل من المفضّلة</a></li>
		</ul>
		<div class="clear">
		</div>
	</div>-->
	<div class="clear">
	</div>
	<!--section post content -->
	<div id="post-5148" class="post_content replace_urls">
	{{{$post->content}}}
	</div>
	<!--end section post content -->
	<div class="clear">
		<br>
	</div>
	<!-- partial add comment -->
	<div id="add_comment">
		<form action="/programming/5148-%D8%A7%D9%84%D8%A8%D8%B1%D9%85%D8%AC%D8%A9-%D9%84%D9%8A%D8%B3%D8%AA-%D9%84%D9%84%D8%AC%D9%85%D9%8A%D8%B9" method="post" class="comment_form">
			<p>
				<textarea id="comment_content" name="comment_content" class="largearea largearea_tall fullwidth"></textarea>
			</p>
			<div class="clear">
			</div>
			<input id="user_token" name="token" value="491d4440dfdc7a9d32d9f12ed9c42cf0e81ad1d8" type="hidden"><input name="comment_parent" value="" type="hidden">
			<p>
				<input class="largebutton" value="أضف التعليق" type="submit">
			</p>
		</form>
	</div>
	<!-- end partial add comment -->
	<div class="clear">
		<br>
	</div>
	<div class="clear">
	</div>
	<!-- begin comments  see post.singleview.comments-->
	<!-- end comment -->
</div>
