@extends('layouts.main')
@section('content')
<div id="communities">
    <div class="content_nav">
        <h2 class="nav_title">المجتمعات</h2>
        <ul>
            
            <li class="{{Request::segment('3') == null ? 'active': false}}"><a href="{{route('communities-browse')}}">مجتمعات تتابعها</a>
            </li>
            <li class="{{Request::segment('3') == 'active' ? 'active': false}}"><a href="{{route('communities-browse-active')}}">الأكثر نشاطاً</a>
            </li>
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
            <li id="category-97" class="category"><span class="category_title"><a href="/Adsense_plan">الخطة أدسنس</a></span><span class="followers_count"><i class="icon-user"></i> 11</span><span class="posts_count"><i class="icon-comments-alt"></i> 2</span><span class="date"><i class="icon-time"></i> قبل 22 ساعة و5 دقائق</span>
                <span
                class="actions"><a href="#" id="category-Adsense_plan" class="category_follow_btn "><i class="icon-thumbs-up-alt"></i> تابع المجتمع</a><a href="#" id="category-Adsense_plan" class="category_unfollow_btn hidden">الغاء المتابعة</a>
                    </span>
            </li>
            
            <li id="category-1" class="category"><span class="category_title"><a href="/webdev">تطوير الويب</a></span><span class="followers_count"><i class="icon-user"></i> 8,056</span><span class="posts_count"><i class="icon-comments-alt"></i> 914</span><span class="date"><i class="icon-time"></i> قبل 37 دقيقة</span>
                <span
                class="actions"><a href="#" id="category-webdev" class="category_follow_btn hidden"><i class="icon-thumbs-up-alt"></i> تابع المجتمع</a><a href="#" id="category-webdev" class="category_unfollow_btn ">الغاء المتابعة</a>
                    </span>
            </li>
        </ul>
    </div>
</div>
@stop

