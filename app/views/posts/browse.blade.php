@extends('layouts.main')
@section('content')
<!-- begin a partial: posts browse list  -->
<div id="home" class="page_sidebar">
    
	<div id="content_nav">
          
		<ul>
			<li class="{{Request::segment('3') == 'popular' || Request::segment('3') == null ? 'active': false}}"><a href="{{route('post-browse-popular')}}">الأكثر شيوعاً</a></li>
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
	@if(!Auth::check())
            @include('widgets.helloregister')
        @endif
        <div class="clear">
		<br/>
	<!-- logged -->
<!--	<div id="recommended_communities" class="widget sidebar_menu">
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
	</div>-->
	<div class="clear">
		<br/>
	</div>
	@include('widgets.latestcomments')
	<div class="clear">
		<br/>
	</div>
<!--	<div id="new_communities" class="widget sidebar_menu">
		<h3>أحدث المجتمعات</h3>
		<ul>
			<li><a href="/AsnadPublicStore"><i class="icon-comments-alt"></i> منتجات أسناد</a></li>
			<li><a href="/newbies"><i class="icon-comments-alt"></i> مجتمع المبتدئين</a></li>
			<li><a href="/companies"><i class="icon-comments-alt"></i> اصحاب الشركات التقنية</a></li>
			<li><a href="/AsnadStore"><i class="icon-comments-alt"></i> أسناد</a></li>
			<li><a href="/ruby"><i class="icon-comments-alt"></i> روبي - Ruby</a></li>
			<li><a href="/communities/new"><i class="icon-reorder"></i> عرض المزيد &raquo;</a></li>
		</ul>
	</div>-->
<!--	<div class="clear">
		<br/>
	</div>-->
<!--	<div id="arabiaweekly" class="widget">
		<h3>أفضل ما ينشر في المواقع العربية</h3>
		<a href="http://arabiaweekly.com" title="نشرة Arabia Weekly" target="_blank"><img src="/images/arabiaweekly.png" width="210" height="175" alt="Arabia Weekly"/></a>
	</div>-->
<!--	<div class="clear">
		<br/>
	</div>-->
</div>
<div class="clear">
</div>
@stop
