<?php

namespace App\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserEdit extends Component
{
    public $user;

    #[Validate]
    public $name;

    #[Validate]
    public $email;

    #[Validate]
    public $password;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'nullable|min:8',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function signup()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route('all-users')->with([
            'status' => 'success',
            'message' => 'User Added Successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.user-edit');
    }
}
