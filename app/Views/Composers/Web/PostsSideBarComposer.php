<?php


namespace App\Views\Composers\Web;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class PostsSideBarComposer
{
    public function compose(View $view)
    {
        $this->composeCategories($view);
        $this->composeArchives($view);
    }

    private function composeCategories(View $view)
    {
        $categories = Category::orderBy('name', 'asc')->with(['posts' => function ($query) {
            $query->published();
        }])->get();
        $view->with('categories', $categories);
    }

    private function composeArchives(View $view)
    {
        $archives = Post::archives();
        $view->with('archives', $archives);
    }
}
