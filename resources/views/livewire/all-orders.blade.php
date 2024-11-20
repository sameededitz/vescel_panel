<div>
    <table class="table display responsive bordered-table mb-0" id="myTable" data-page-length='10'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Signature</th>
                <th scope="col">Customer</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                <th scope="col">Ordered At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td><a href="javascript:void(0)" class="text-primary-600"> {{ $loop->iteration }} </a></td>
                    <td>
                        <div class="d-flex align-items-center">
                            {{-- <img src="{{ $order->getFirstMediaUrl('signature') }}" alt="subcategory-image"
                                class="w-64-px flex-shrink-0 me-12 radius-8"> --}}
                        </div>
                    </td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        @if ($editingOrderid == $order->id)
                            <select class="form-control" id="status" wire:model.defer="editedstatus"
                                wire:change="updateStatus" name="status">
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        @else
                            {{ ucfirst($order->status) }}
                        @endif
                    </td>
                    <td>{{ $order->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            @if ($editingOrderid == $order->id)
                                <button type="button" wire:click="cancelEdit"
                                    class="w-32-px me-4 h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="proicons:cancel"></iconify-icon>
                                </button>
                            @else
                                <button type="button"
                                    wire:click="confirmStatus({{ $order->id }}, '{{ $order->status }}')"
                                    class="w-32-px me-4 h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </button>
                            @endif
                            <a href="{{ route('order-details', $order->id) }}"
                                class="w-32-px me-4 h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="fluent-mdl2:product-list"></iconify-icon>
                            </a>
                            <form action="{{ route('delete-subcategory', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
