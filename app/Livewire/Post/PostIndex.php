<?php

namespace App\Livewire\Post;

// use App\Models\Post;

use App\Models\Post;
use Livewire\Component;
// use Livewire\WithPagination;

class PostIndex extends Component
{
    public $title;
    public $content;

    public function render()
    {
        return view('livewire.post.index',[
            'posts' => Post::latest()->paginate(5)
        ]);
    }

    public function store()
    {
        $this->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        $post = Post::create([
            'title'     => $this->title,
            'content'   => $this->content
        ]);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        // return redirect()->view('livewire.post.index');
    }
}
