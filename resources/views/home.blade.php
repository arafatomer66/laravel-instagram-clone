@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
             <img style="height:130px;width:130px;" src="/img/logo.png" class="rounded-circle" >
        </div>
        <div class="col-9 pt-5">
        <div><h1>{{ $user->username }}</h1></div>
             <div class="d-flex">
                 <div class="pr-5"><strong>153</strong> posts</div>
                 <div class="pr-5"><strong>23k</strong> followers</div>
                 <div class="pr-5"><strong>212</strong> following</div>
             </div>

             <div class="pt-4 font-weight-bold" > {{ $user->profile->title }} </div>
             <div>{{ $user->profile->description }}</div>
             <div> <a href="https://www.omerarafat.com">{{ $user->profile->url ?? 'N/A' }}</a> </div>           
        </div>
    </div>


    <div class="row pt-5">
        <div class="col-4">
            <img src="/img/2.jpg" class="w-100" >
        </div>
        <div class="col-4">
            <img src="/img/2.jpg" class="w-100" >
        </div>
        <div class="col-4">
            <img src="/img/2.jpg" class="w-100" >
        </div>
    </div>
</div>
@endsection
