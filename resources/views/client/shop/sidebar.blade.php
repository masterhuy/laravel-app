 <!-- Shop Sidebar Start -->
 <div class="col-lg-3 col-md-12">
    <!-- Price Start -->
    <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
        <form action="{{ route('products.filter') }}" method="GET">
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input
                    type="checkbox"
                    name="price_range[]"
                    value="0-100"
                    class="custom-control-input"
                    id="price-1"
                    {{-- {{ collect($priceRanges)->contains('0-100') ? 'checked' : ''}} --}}
                >
                <label class="custom-control-label" for="price-1">$0 - $100</label>
                <span class="badge border font-weight-normal">{{ $count_0_100 }}</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input
                    type="checkbox"
                    name="price_range[]"
                    value="101-200"
                    class="custom-control-input"
                    id="price-2"
                    {{-- {{ collect($priceRanges)->contains('101-200') ? 'checked' : ''}} --}}
                >
                <label class="custom-control-label" for="price-2">$101 - $200</label>
                <span class="badge border font-weight-normal">{{ $count_101_200 }}</span>
            </div>
            <button type="submit">Filter</button>
        </form>
    </div>
    <!-- Price End -->

    <!-- Color Start -->
    <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
        <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" checked id="color-all">
                <label class="custom-control-label" for="price-all">All Color</label>
                <span class="badge border font-weight-normal">1000</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-1">
                <label class="custom-control-label" for="color-1">Black</label>
                <span class="badge border font-weight-normal">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-2">
                <label class="custom-control-label" for="color-2">White</label>
                <span class="badge border font-weight-normal">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-3">
                <label class="custom-control-label" for="color-3">Red</label>
                <span class="badge border font-weight-normal">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-4">
                <label class="custom-control-label" for="color-4">Blue</label>
                <span class="badge border font-weight-normal">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input" id="color-5">
                <label class="custom-control-label" for="color-5">Green</label>
                <span class="badge border font-weight-normal">168</span>
            </div>
        </form>
    </div>
    <!-- Color End -->

    <!-- Size Start -->
    <div class="mb-5">
        <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
        <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" checked id="size-all">
                <label class="custom-control-label" for="size-all">All Size</label>
                <span class="badge border font-weight-normal">1000</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-1">
                <label class="custom-control-label" for="size-1">XS</label>
                <span class="badge border font-weight-normal">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-2">
                <label class="custom-control-label" for="size-2">S</label>
                <span class="badge border font-weight-normal">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-3">
                <label class="custom-control-label" for="size-3">M</label>
                <span class="badge border font-weight-normal">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-4">
                <label class="custom-control-label" for="size-4">L</label>
                <span class="badge border font-weight-normal">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input" id="size-5">
                <label class="custom-control-label" for="size-5">XL</label>
                <span class="badge border font-weight-normal">168</span>
            </div>
        </form>
    </div>
    <!-- Size End -->
</div>
<!-- Shop Sidebar End -->
