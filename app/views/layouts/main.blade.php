<!DOCTYPE html>
<html>
<head>
<title>@yield('title')| Arabia I&#x2F;O</title>
<meta name="description" content="يمكنك هنا طرح ومناقشة الأفكار والقضايا التقنية والعلمية والمشاركة في العديد من المجتمعات المختلفة." />
<meta name="keywords" content="نقاش، أفكار، تقنية، علمي، مجتمعات، مجتمع، تطوير, ويب, الويب, مطوري, تجارة الكترونية, تسويق, إعلان, العمل الحر, اعلام اجتماعي" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width"><meta http-equiv="X-UA-Compatible" content="IE=edge" />
@yield('meta')
{{ HTML::style('/css/style.css'); }}
{{ HTML::style('/css/font-awesome.css'); }}
<!--<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">-->

@yield('styles')
<!--[if IE 7]>  <link rel="stylesheet" href="/css/font-awesome-ie7.min.css"><![endif]-->
<script type="text/javascript" src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript" src="/js/jquery-ui-1.8.22.min.js')}}">
</script><script type="text/javascript" src="{{asset('js/jquery.tag-it.js')}}">
</script><script type="text/javascript" src="{{asset('js/select2.jquery.min.js')}}">
</script><script type="text/javascript" src="{{asset('js/jquery.dropdown.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.nailthumb.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/application.js')}}"></script>
<!--[if lt IE 10 ]><script type="text/javascript" src="/js/application.ie.js?070113"></script><![endif]--> 
<script type="text/javascript" src="{{asset('js/fileuploader.js')}}"></script>
<link rel="alternate" type="application/rss+xml" title="Arabia I/O - الأكثر شعبية" href="https://arabia.io/rss.xml" />
<link rel="alternate" type="application/rss+xml" title="Arabia I/O - أحدث المساهمات" href="https://arabia.io/new/rss.xml" />
<!--<meta property="og:title" content="Arabia I&#x2F;O" />
<meta property="og:description" content="يمكنك هنا طرح ومناقشة الأفكار والقضايا التقنية والعلمية والمشاركة في العديد من المجتمعات المختلفة." />
<meta property="og:image" content="https://arabia.io/images/arabiaio-icon.png" />
<meta property="og:image" content="https://arabia.io/images/arabiaio-large.png" />-->
<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
@yield('scripts')
</head>
<body>

@include('partials.navigation')


<div class="clear"></div>

@include('partials.header')
<!--

-->

<!-- this changes from page to page -->
<div id="content">
<div class="inside">
<noscript><div id="noscript" class="msg_box yellow_box tcenter">هذا الموقع يحتاج JavaScript ليعمل بشكل صحيح. فعّل جافاسكريبت في المتصفح الذي تستخدمه أو استخدم متصفح أحدث.</div></noscript>

<!-- alerts -->
@include('partials.alerts')


<!-- this is the content holder, put a section after this tag  called content -->
<div id="page">
@yield('content')
</div>
</div>

<div class="clear"></div>

</div>
<!-- end content -->


@include('partials.footer')
<!---->

@include('partials.footer_partners')
<!--

-->


@include('partials.footer_copyright')
<!---->
<!-- drop down menu when  logged in -->
@include('partials.dropdown_user')

@include('partials.dropdown_add_post')

@include('partials.dropdown_notifications')

@include('partials.dropdown_search')

@include('partials.dropdown_communities')

<!--<input id="user_token" type='hidden' name='token' value='491d4440dfdc7a9d32d9f12ed9c42cf0e81ad1d8' />

<div id="shadow_box"></div>

<div id="dialog_form"><div id="dialog_title"></div>

<div id="dialog_body"></div>

<div id="dialog_buttons" class="clear"></div>

<div class="clear"></div></div>-->

@yield('analytics')

</body>
</html>