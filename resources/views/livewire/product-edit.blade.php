<div>
    @if ($errors->any())
        <div class="py-2">
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error" />
            @endforeach
        </div>
    @endif
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <div class="row gy-3">
            <div class="col-12">
                <label for="expirationDate" class="form-label">Image</label>
                <div class="upload-image-wrapper d-flex align-items-center gap-3">
                    <div
                        class="uploaded-img position-relative h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                        @if ($image)
                            <button type="button" wire:click="removeImage"
                                class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>
                            </button>
                        @endif
                        <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                            src="{{ $image ? $image->temporaryUrl() : $product->getFirstMediaUrl('image') }}"
                            alt="image">
                    </div>

                    <label
                        class="upload-file h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                        for="upload-file">
                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                        <span class="fw-semibold text-secondary-light">Upload</span>
                        <input id="upload-file" type="file" wire:model.live="image" accept="image/*" name="image"
                            hidden>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" wire:model="name" placeholder="Name">
            </div>
            <div class="col-12">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" wire:model="price" placeholder="Price">
            </div>
            <div class="col-12">
                <label class="form-label">Discount Percentage</label>
                <input type="text" name="discount" class="form-control" wire:model="discount"
                    placeholder="Discount Percentage">
            </div>
            <div class="col-12">
                <label class="form-label">Units </label>
                <input type="text" name="units" class="form-control" wire:model="units" placeholder="Units">
            </div>
            <div class="col-12">
                <label class="form-label">Category </label>
                <select name="category" wire:model.live="category" class="form-select">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Sub Category </label>
                <select name="subcategory_id" wire:model="subCategory" class="form-select">
                    <option value="" selected>Select Sub Category</option>
                    @foreach ($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Status </label>
                <select name="status" wire:model="status" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Description </label>
                <textarea name="description" wire:model="description" class="form-control" cols="10" rows="2"></textarea>
            </div>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary-600">Update</button>
        </div>
    </form>
</div>
