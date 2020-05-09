<?php


namespace App\Views\Composers\Web;

use App\Models\Post;
use Illuminate\View\View;

class NewBlogComposer
{
    public function compose(View $view)
    {
        $this->composeNewPosts($view);
    }

    private function composeNewPosts(View $view)
    {
        $newPosts = Post::with(['author'])->latest()->take(3)->get();
        $view->with('newPosts', $newPosts);
    }
}
