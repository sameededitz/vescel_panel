@extends('layout.admin-layout')
@section('title')
    Add Product | Admin | {{ config('app.name') }}
@endsection
@section('admin_content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Product</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('admin-home') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Products</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Add Product</h6>
                </div>
                <div class="card-body">
                    @livewire('product-add')
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection
@section('admin_scripts')
    <script></script>
@endsection