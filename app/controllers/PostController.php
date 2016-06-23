<?php

class PostController extends BaseController
{
    public function store()
    {

        $validator = Validator::make(Input::all(), Post::$rules);


        $user = Auth::user();
        $family_id = $user->family_id;

        $post = new Post();
        $post->body = Input::get('body');
        $post->user_id = $user->id;
        $post->family_id = $family_id;
        // $post->img_url = ;

        if($validator->fails()) {
            return Redirect::back();
            Session::flash('errorMessage', 'Could not save post');  //this line may have to be deleted
        } else{
            $post->save();
            return Redirect::back();
            Session::flash('successMessage', 'Post saved!');
        }

    }


    public function update($id)
    {
        $validator = new PostsValidator();
        $validator->validate(Input::all());

        $post = Post::find($id);
        $post->body = Input::get('body');
        // $post->img_url = ;

        if($validator->fails()) {
            return Redirect::back();
            Session::flash('errorMessage', 'Could not save post');  //this line may have to be deleted
        } else {
            $post->save();
            Session::flash('successMessage', 'Post updated!');
        }
    }
}
