<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\postCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class AdminPostsController extends Controller
{
    //

    public function index(){


        $posts=Post::paginate(5);

        return view('admin.index')->with('posts',$posts);
    }


    public function create(){

        return view('admin.create');
    }


    public function store(postCreateRequest $request){
        $city= new City();
        $city->name=$request->city;
        $city->save();
        $user=Auth::user();
        $post=new Post();
        $post->city_id=$city->id;
        $post->title=$request->title;
        $post->body=$request->body;
        $post->food=$request->food;
        $post->sightseeing=$request->sightseeing;

        $newpost=$user->posts()->save($post);


        $images=$request->filename;

            foreach ($images as $image ){

                $photo= new Photo();
                $path=Storage::disk('public')->put('images',$image);
                $photo->photo=$path;
                $photo->post_id=$newpost->id;
                $photo->save();
            }

            return redirect('admin/post/create');


    }



    public function destroy($id){

        $post=Post::find($id);

            if ($post->photos){

              foreach ($post->photos as $photo){

                  Storage::disk('public')->delete($photo->photo);
              }

                $post->photos()->delete();


            }

       $post->delete();

        Session::flash('delete_post','پست مورد نظر حذف شد');
        return redirect()->back();

    }




//    give data to edit function
    public function edit($id){

        $post=Post::find($id);

        return view('admin.update')->with('post',$post);
    }

    public function update(EditPostRequest $request,$id){


        $post['title']=$request->title;
        $post['body']=$request->body;
        $post['food']=$request->food;
        $post['sightseeing']=$request->sightseeing;
        Auth::user()->posts()->whereId($id)->update($post);
        City::whereId($request->cityId)->update(['name'=>$request->city]);

        if ($request->hasFile('filename')){

            foreach ($request->filename as $file){
                $photo=new Photo();
                $path=Storage::disk('public')->put('images',$file);
                $photo->photo=$path;
                $photo->post_id=$id;
                $photo->save();


            }
        }

        return redirect()->back();

        
    }


    public function showPost($slug){


        $post=Post::findBySlug($slug);
        $comments=$post->comments()->paginate(3);
        return view('user.show-post')->with('post',$post)->with('comments',$comments);
    }

    //for making a post active or de-active
    public function Approve(Request $request,$id){


        Post::find($id)->update(['is_active'=>$request->active]);

        return redirect('admin');
    }


}
