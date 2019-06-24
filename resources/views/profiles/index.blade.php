@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img style="height:130px;width:130px;" src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" >
        </div>
        <div class="col-9 pt-5">
        <div class="d-flex justify-content-between align-items-baseline" >
                <div class="d-flex pb-2 align-items-center" >

                        <div class="h4" >{{ $user->username }}</div>

                        {{-- FollowButton Component --}}
    
                        <follow-button  user-id ="{{ $user->id }}" follows = "{{ $follows }}" ></follow-button>
    
                </div>
            @can('update', $user->profile)
            <a href="/p/create">Add New Post</a>
        @endcan
        </div>
        @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Post</a>
        @endcan
        
             <div class="d-flex">
             <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                 <div class="pr-5"><strong>{{ $user->profile->follower->count() }}</strong> followers</div>
                 <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
             </div>

             <div class="pt-4 font-weight-bold" > {{ $user->profile->title }} </div>
             <div>{{ $user->profile->description }}</div>
             <div> <a href="https://www.omerarafat.com">{{ $user->profile->url ?? 'N/A' }}</a> </div>           
        </div>
    </div>


    <div class="row pt-5">

        @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
        <a href="/p/{{$post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100" >
        </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
