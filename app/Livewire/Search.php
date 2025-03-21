<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
    #[Validate('required')]

    public $searchText = '';
    public $results = [];

    public function updatedSearchText($value)
    {
        $this->reset('results');
        $this->validate();
        $searchTerm = "%{$value}%";

        $this->results = Post::where('title', 'like', '%' . $this->searchText . '%')->get();
    }
    public function clear()
    {
        $this->reset('results','searchText');
    }
    public function render()
    {
        return view('livewire.search');
    }
}
