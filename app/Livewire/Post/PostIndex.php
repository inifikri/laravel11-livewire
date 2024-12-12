<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
// use Livewire\WithPagination;

class PostIndex extends Component
{
    public function render()
    {
        return view('livewire.post.index',[
            'posts' => Post::latest()->paginate(5)
        ]);
    }
}
