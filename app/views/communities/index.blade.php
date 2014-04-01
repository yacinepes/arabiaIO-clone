@extends('layouts.main')
@section('content')
<div id="communities">
    <div class="content_nav">
        <h2 class="nav_title">المجتمعات</h2>
        <ul>
            @if(Auth::check())
            <li class="{{Request::segment('3') == null ? 'active': false}}"><a href="{{route('communities-browse')}}">مجتمعات تتابعها</a>
            </li>
            <li class="{{Request::segment('3') == 'active' ? 'active': false}}"><a href="{{route('communities-browse-active')}}">الأكثر نشاطاً</a>
            </li>
            @else
            <li class="{{Request::segment('3') == 'active' || Request::segment('3') == null ? 'active': false}}"><a href="{{route('communities-browse-active')}}">الأكثر نشاطاً</a>
            </li>
            @endif
            
            <li class="{{Request::segment('3') == 'recent' ? 'active': false}}"><a href="{{route('communities-browse-recent')}}">الأحدث</a>
            </li>
        </ul>
        <ul class="left">
            <li><a href="#">أنشئ مجتمعاً جديداً</a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
    <div id="page_content">
        <ul id="categories_list" class="table_ul">
            <li class="table_title"><span class="category_title">اسم المجتمع</span><span class="followers_count">عدد المتابعين</span><span class="posts_count">عدد المواضيع</span><span class="date">آخر تفاعل</span><span class="actions"></span>
            </li>
            @foreach($communities as $community)
                @include('partials.community.listitem')
            @endforeach
        </ul>
    </div>
    <div class="clear">
		<br/>
	</div>
	<div id="more_content">
		{{$communities->links()}}
	</div>
</div>
@stop

