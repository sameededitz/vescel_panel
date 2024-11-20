<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class AllOrders extends Component
{
    public $orders;

    public $editingOrderid = null;
    public $editedstatus;

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function confirmStatus($orderId, $status)
    {
        $this->editingOrderid = $orderId;
        $this->editedstatus = $status;
    }

    public function updateStatus()
    {
        $order = Order::find($this->editingOrderid);

        if ($order) {
            $order->update(['status' => $this->editedstatus]);
            session()->flash('message', 'Order status updated successfully!');
        } else {
            session()->flash('error', 'Order not found.');
        }

        // Reset editing state
        $this->cancelEdit();

        // Refresh orders
        $this->mount();
    }

    public function cancelEdit()
    {
        $this->editingOrderid = null;
        $this->editedstatus = null;
    }

    public function render()
    {
        return view('livewire.all-orders');
    }
}
