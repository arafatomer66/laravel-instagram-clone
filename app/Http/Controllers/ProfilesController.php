<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\User;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;

        //  dd($follows);

        // $user =  User::findOrFail($user);
        // return view('profiles.index', [
        //     'user' => $user
        // ]);

        $postCount =  Cache::remember(
            'count.posts.' .$user->id ,
            now()->addSeconds(30),
            function() use ($user){
            return $user->posts->count() ;
        }) ;
        $followersCount = $user->profile->follower->count() ;
        $followingsCount =  $user->following->count() ;

        return view('profiles.index' , compact('user' , 'follows' , 'postCount' , 'followersCount' ,'followingsCount' ));
    }
    //edit prilfe

    public function edit(User $user)
    {

        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }


    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data =  request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);



        if (request('image')) {

            $imagePath = request('image')->store('profile', 'public');

            //image processing

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);

            $image->save();

            $imageArray = [ 'image' => $imagePath ] ;
        }




        //extra layer of auth()
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/profile/' . $user->id);
    }
}
