@extends('layouts.main')
@section('title','Login')
@section('content')
    <!-- drop down menu when not logged in -->
<!--<div style="display: inline; left: 385px; top: 86px;" id="dropdown-login" class="dropdown dropdown-tip">-->
    <div class="dropdown-panel">
        @include('partials.account.login')
        <!-- signup -->
        @include('partials.account.register')
                    <div class="clear">
            </div>
    </div>
               <!--</div>-->
    
@stop


