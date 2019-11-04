<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //
    public function index(){

    }

    public function gallery(){


        $posts=Post::paginate(8);

        return view('user.gallery')->with('posts',$posts);

    }



    public function destroy($id)
    {


        $photo = Photo::find($id);

        $post = $photo->post;

        if (count($post->photos) > 1){
        Storage::disk('public')->delete($photo->photo);

        $photo->delete();

        }else{
            Session::flash('existence','تعداد عکسهای موجود کم است و شما قادر به پاک کردن بقیه نیستید');
          }

//        return redirect('admin/post/edit/'.$post->id);

        return redirect()->back();
        
    }
}
