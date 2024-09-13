<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $user;

    protected $listeners = ['pointsUpdated' => 'refreshUser'];
    public function mount()
    {
        $this->user = Auth::user();
    }

    public function refreshUser()
    {
        $this->user = Auth::user()->fresh();
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
