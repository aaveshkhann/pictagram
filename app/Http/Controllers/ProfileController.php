<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\TempFile;
use App\Models\Profile;
class ProfileController extends Controller
{
    public function index()
    {
        $data = User::find(\Auth::id());
        return view('home')->with('users',$data);
    }

    public function edit()
    {
        // User variable bhejna hota hai view me... hawa me thode aega user
        $user = User::find(\Auth::id());
         return view ('edit')->with('user',$user);
    }

    public function update (Request $request ){


         $request->validate([
           'title'=>'required',
           'description'=>'required',
           'url'=>'required',
           'profile_image'=>''
         ]);

         $filename = '';
        if($request->profile_image){
            $temp = TempFile::where('folder', $request->profile_image)->first();

            $filename= $temp->filename;

            $oldpath = public_path('profile_image/temp/').$temp->folder.'/'.$temp->filename;
//            $newpath =  public_path('profile_image/temp/123/').$temp->folder.'/'.$temp->filename;

            $newpath = public_path('profile_image').'/'.$temp->folder.'/'.$temp->filename;

            //dd([$oldpath, $newpath]);
  //          rename($oldpath, $newpath);

            move_uploaded_file($oldpath, $newpath);

            $temp->delete();

        }

        $user = User::find(\Auth::id());
        $user->profile->profile_image= $filename;
        $user->profile->title=$request->title;
        $user->profile->description=$request->description;
        $user->profile->url=$request->url;
        $user->profile->save();

        //   $user->profile->update(array_merge(
        //     $profile,
        //     $imageArray ?? []
        //   ));

             return redirect('/profile');
    }

}
