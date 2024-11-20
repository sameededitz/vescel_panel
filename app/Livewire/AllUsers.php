<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AllUsers extends Component
{
    public $users;

    public function mount()
    {
        // Load all users with the 'customer' role
        $this->users = User::where('role', 'customer')
            ->get();
    }

    public function render()
    {
        return view('livewire.all-users');
    }
}
