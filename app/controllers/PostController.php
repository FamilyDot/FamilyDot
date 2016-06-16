<?php

class PostController extends BaseController
{
    public function store()
    {
        $user = Auth::user();
        $family_id = $user->family_id;

        $post = new Post();
        $post->body = Input::get('body');
        $post->user_id = $user->id;
        $post->family_id = $family_id;
        // $post->img_url = ;
        $post->save();
    }

    public function update($id)
    {
        $post = Post::find($id);
        $post->body = Input::get('body');
        // $post->img_url = ;
        $post->save();
    }
}
