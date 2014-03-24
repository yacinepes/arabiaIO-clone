@extends('layouts.main')
@section('content')
<!-- begin a partial: posts browse list  -->
<div id="home" class="page_sidebar">
    
	<div id="content_nav">
		<ul>
			<li class="{{Request::segment('3') == 'popular' ? 'active': false}}"><a href="{{route('post-browse-popular')}}">الأكثر شيوعاً</a></li>
			<li class="{{Request::segment('3') == 'new' ? 'active': false}}"><a href="{{route('post-browse-new')}}">الأحدث</a></li>
<!--			<li><a href="/discover">اكتشف!</a></li>-->
			<li class="{{Request::segment('3') == 'top' ? 'active': false}}"><a href="{{route('post-browse-top')}}">الأفضل</a></li>
<!--			<li><a href="/favorites">مفضّلتي</a></li>-->
		</ul>
<!--		<ul class="left">
			<li><a href="/questions">أسئلة لك</a></li>
		</ul>-->
		<div class="clear">
		</div>
	</div>
	<!-- this changes from page to page, add section here -->
	<div id="posts">
            @foreach($posts as $post)
                @include('partials.post.listitem',compact($post))
            @endforeach
<!--		<div id="post-5154" class="post">
			<div class="post_vote">
				<div class="post_upvote">
					<a id="post_upvote-5154" href="#" class="upvote_btn"><i class="icon-angle-up"></i></a>
				</div>
				<div class="post_points ltr">
					0
				</div>
				<div class="post_downvote ">
					<a id="post_downvote-5154" href="#" class="downvote_btn"><i class="icon-angle-down"></i></a>
				</div>
			</div>
			<div style="overflow: hidden; padding: 0px; width: 50px; height: 50px;" class="post_image nailthumb-container square-thumb-s">
				<a href="https://www.youtube.com/watch?v=fOwq2t6nBiA" rel="nofollow" target="_blank"><img class="nailthumb-image" style="position: relative; width: 88.75px; height: 50px; top: 0px; left: -19.375px; display: inline;" src="/uploads/posts/5154-24-02-14-3c7b78aa1d.png"></a>
			</div>
			<div class="post_title">
				<h2><a href="https://www.youtube.com/watch?v=fOwq2t6nBiA" rel="nofollow" target="_blank">‫خطورة مواقع زيادة المتابعين و الاعجابات | Exa-Te4m‬‎ - YouTube</a><span class="post_domain">(youtube.com)</span></h2>
			</div>
			<div class="post_meta with_image">
				نشر في <a class="post_category" href="/general">عام</a> بواسطة <a class="post_user" href="/u/abarbod">abarbod</a><span class="post_date">قبل ساعة و31 دقيقة</span> | <span class="post_favorite" id="fp-5154"><a class="remove_favorite hidden" href="#"><i class="icon-star"></i> أزل من المفضّلة</a><a class="add_favorite " href="#">أضف الى المفضّلة</a></span> | <span class="post_comments"><a href="/general/5154-%D8%AE%D8%B7%D9%88%D8%B1%D8%A9-%D9%85%D9%88%D8%A7%D9%82%D8%B9-%D8%B2%D9%8A%D8%A7%D8%AF%D8%A9-%D8%A7%D9%84%D9%85%D8%AA%D8%A7%D8%A8%D8%B9%D9%8A%D9%86-%D9%88-%D8%A7%D9%84%D8%A7%D8%B9%D8%AC%D8%A7%D8%A8%D8%A7%D8%AA-exa-te4m-youtube" class="strong">ابدأ النقاش</a></span>
			</div>
		</div>-->
<!--		<div id="post-5148" class="post">
			<div class="post_vote">
				<div class="post_upvote">
					<a id="post_upvote-5148" href="#" class="upvote_btn"><i class="icon-angle-up"></i></a>
				</div>
				<div class="post_points ltr">
					8
				</div>
				<div class="post_downvote ">
					<a id="post_downvote-5148" href="#" class="downvote_btn"><i class="icon-angle-down"></i></a>
				</div>
			</div>
			<div class="post_title">
				<h2><a href="/programming/5148-%D8%A7%D9%84%D8%A8%D8%B1%D9%85%D8%AC%D8%A9-%D9%84%D9%8A%D8%B3%D8%AA-%D9%84%D9%84%D8%AC%D9%85%D9%8A%D8%B9">البرمجة ليست للجميع</a></h2>
			</div>
			<div class="post_meta ">
				نشر في <a class="post_category" href="/programming">برمجة عامة</a> بواسطة <a class="post_user" href="/u/thamood">thamood</a><span class="post_date">قبل ساعة و5 دقائق</span> | <span class="post_favorite" id="fp-5148"><a class="remove_favorite hidden" href="#"><i class="icon-star"></i> أزل من المفضّلة</a><a class="add_favorite " href="#">أضف الى المفضّلة</a></span> | <span class="post_comments"><a href="/programming/5148-%D8%A7%D9%84%D8%A8%D8%B1%D9%85%D8%AC%D8%A9-%D9%84%D9%8A%D8%B3%D8%AA-%D9%84%D9%84%D8%AC%D9%85%D9%8A%D8%B9" class="strong">6 تعليقات</a></span>
			</div>
		</div>-->
	</div>
	<div class="clear">
		<br/>
	</div>
	<div id="more_content">
		{{$posts->links()}}
	</div>
</div>
<div id="home_sidebar" class="sidebar">
	<!-- when not logged in -->
	<div id="intro" class="widget text">
		<h3>أهلا بك في Arabia I/O</h3>
		<p>
			يمكنك هنا طرح ومناقشة الأفكار والقضايا التقنية والعلمية والمشاركة في العديد من المجتمعات المختلفة. <a href="/about">إعرف المزيد...</a>
		</p>
		<a href="#" id="signup_btn" class="" data-dropdown="#dropdown-login"><i class="icon-signin"></i> سجّل الآن!</a>
	</div>
	<!-- logged -->
	<div id="recommended_communities" class="widget sidebar_menu">
		<h3>مجتمعات قد يهمّك متابعتها</h3>
		<ul>
			<li><span class="recommended_category_details"><a href="/fun"><i class="icon-comments-alt"></i> تسلية</a></span>
			<p class="recommended_category_follow">
				<a href="#" id="category-fun" class="category_follow_interest_btn"><i class="icon-thumbs-up-alt"></i> تابع المجتمع</a><a href="#" id="category-fun" class="category_nointerest_btn"><i class="icon-remove"></i></a>
			</p>
			</li>
			<li><span class="recommended_category_details"><a href="/Security"><i class="icon-comments-alt"></i> حماية واختراق</a></span>
			<p class="recommended_category_follow">
				<a href="#" id="category-Security" class="category_follow_interest_btn"><i class="icon-thumbs-up-alt"></i> تابع المجتمع</a><a href="#" id="category-Security" class="category_nointerest_btn"><i class="icon-remove"></i></a>
			</p>
			</li>
			<li><span class="recommended_category_details"><a href="/gaming"><i class="icon-comments-alt"></i> ألعاب الفيديو</a></span>
			<p class="recommended_category_follow">
				<a href="#" id="category-gaming" class="category_follow_interest_btn"><i class="icon-thumbs-up-alt"></i> تابع المجتمع</a><a href="#" id="category-gaming" class="category_nointerest_btn"><i class="icon-remove"></i></a>
			</p>
			</li>
		</ul>
	</div>
	<div class="clear">
		<br/>
	</div>
	<div id="latest_comments" class="widget sidebar_menu">
		<h3>آخر التعليقات</h3>
		<ul>
			<li id="latest_comment-18585" class="latest_comment"><a href="/u/abszar"><img src="https://secure.gravatar.com/avatar/5a9733887382a2e24b4ab855295abb86?s=32&d=mm" width="32" height="32" align="right"/></a><span class="comment_content"><span class="comment_user"><a href="/u/abszar">abszar:</a>&nbsp;</span><a href="/AMA/5098-%25D8%25A3%25D9%2586%25D8%25A7-%25D9%2585%25D8%25AD%25D9%2585%25D8%25AF-%25D8%25A7%25D9%2584%25D9%258A%25D9%2588%25D8%25B3%25D9%2581%25D9%258A-%25D8%25A3%25D8%25B3%25D8%25A3%25D9%2584%25D9%2586%25D9%258A-%25D9%2585%25D8%25A7-%25D8%25AA%25D8%25B4%25D8%25A7%25D8%25A1#comment_18585">أهلا بك أخي محمد أنا أحب...</a></span></li>
		</ul>
	</div>
	<div class="clear">
		<br/>
	</div>
	<div id="new_communities" class="widget sidebar_menu">
		<h3>أحدث المجتمعات</h3>
		<ul>
			<li><a href="/AsnadPublicStore"><i class="icon-comments-alt"></i> منتجات أسناد</a></li>
			<li><a href="/newbies"><i class="icon-comments-alt"></i> مجتمع المبتدئين</a></li>
			<li><a href="/companies"><i class="icon-comments-alt"></i> اصحاب الشركات التقنية</a></li>
			<li><a href="/AsnadStore"><i class="icon-comments-alt"></i> أسناد</a></li>
			<li><a href="/ruby"><i class="icon-comments-alt"></i> روبي - Ruby</a></li>
			<li><a href="/communities/new"><i class="icon-reorder"></i> عرض المزيد &raquo;</a></li>
		</ul>
	</div>
	<div class="clear">
		<br/>
	</div>
	<div id="arabiaweekly" class="widget">
		<h3>أفضل ما ينشر في المواقع العربية</h3>
		<a href="http://arabiaweekly.com" title="نشرة Arabia Weekly" target="_blank"><img src="/images/arabiaweekly.png" width="210" height="175" alt="Arabia Weekly"/></a>
	</div>
	<div class="clear">
		<br/>
	</div>
</div>
<div class="clear">
</div>
@stop
