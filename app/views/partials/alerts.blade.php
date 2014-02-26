<!--<div class="msg_box tcenter error">لم تكتب أي تعليق بعد</div>-->
@if($errors->count())
    <div class="msg_box tcenter error">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
@endif

