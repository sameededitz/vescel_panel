<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class DashboardStats extends Component
{
    public $userCount;
    public $orderCount;
    public $productCount;

    public function mount()
    {
        $this->userCount = User::where('role', 'customer')->count();
        $this->orderCount = Order::count();
        $this->productCount = Product::count();
    }
    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
