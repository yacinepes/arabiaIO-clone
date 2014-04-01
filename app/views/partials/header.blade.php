<div id="header">
    <div class="inside">
        <div id="logo" class="right">
            <h1><a href="{{route('default')}}"><img src="{{asset('/images/arabiaio.png')}}" alt="Arabia I/O" /></a></h1>
        </div>
        <div id="user_nav" class="left">
        	<a id="user_btn" 
                   @if(Auth::check())
                     href="{{route('user-index',[Auth::user()->username])}}" 
                   @else
                     href="{{route('account-login')}}" 
                   @endif
                   >
                <!--<img id="user_image" src="https://secure.gravatar.com/avatar/a677aa78851c756b324af91bf2a59695?s=52&d=mm" width="26" height="26" />-->
            	<i class="fa fa-user"></i>
            </a>
            @if(Auth::check())
             <a id="notifications_btn" href="{{route('notifications-browse')}}"   title="التنبيهات">
                 <i class="fa fa-flag">
                     @if($notificationsCount > 0)
                     <span class="upper_count">{{$notificationsCount}}</span>
                     @endif
                 </i>
            </a> 
            @endif
                @if(Auth::check())
           	<a id="add_btn" href="{{route('post-submit')}}"   title="أضف مساهمة جديدة">
           		<i class="fa fa-plus-square"></i>
           	</a> 
                @endif
           	<a id="search_btn" href="#" title="بحث" >
           		<i class="fa fa-search"></i></a> 
       		<a id="categories_btn" href="{{route('communities-browse')}}" title="المجتمعات" >
       			<i class="fa fa-users"></i>
       		</a> 
                @if(Auth::check())
       		<a id="logout_btn" href="{{route('account-logout')}}" title="خروج" >
       			<i class="fa fa-sign-out"></i>
       		</a> 
                @endif
       	</div>
    </div>

<div class="clear"></div>
</div>
