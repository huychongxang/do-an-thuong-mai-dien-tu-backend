<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTags()
    {
        $tags = Tag::pluck('name');
        return $tags;
    }
}
