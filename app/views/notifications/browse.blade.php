@extends('layouts.main')
@section('content')
<div id="notifications" class="page_sidebar">
    <div id="content_nav">
        <h2 id="nav_title">مركز التنبيهات</h2>
        <div class="clear"></div>
    </div>
    <div id="page_content">
        <ul id="notifications_list" class="table_ul">
            @foreach($notifications as $notification)
            <li id="notification-{{$notification->id}}" class="notification ">
                @if(!$notification->read) <b> @endif
                {{$notification->getHTML()}}
                @if(!$notification->read) </b> @endif
            </li>
            @endforeach
        </ul>
        {{$notifications->links()}}
    </div>
</div>
@stop

