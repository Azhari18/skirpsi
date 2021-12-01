 
 <div class="col-sm-4">
    <div class="card">
        <div class="card-body">

            <!-- Start Header -->
            <h5 class="d-flex justify-content-between align-items-center">
                <span>Order</span>
                <button onclick="orderbasketClear()" class="btn btn-sm btn-danger rounded-pill">Clear</button>
                {{-- <span></span> --}}
            </h5>
            <hr>
            <!-- End Header -->

            <!-- Start List Item -->
            <ul class="list-unstyled" id="orderlist" style="height: 50vh; overflow-y: auto;">
            </ul>
            <hr>
            <!-- End List Item -->

            <!-- Start Footer -->
            <ul class="list-unstyled mb-0">

                <!-- Start Summary  -->
                <li class="d-flex justify-content-between align-items-center">
                    <big>Total Items: </big>
                    <big id="totalItems" class=" fw-bold card-text">0</big>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                    <big>Total: </big>
                    <big class="fw-bold">Rp. <span id="totalCost" class="card-text">0</span></big>
                </li>
                <!-- End Summary  -->

                <!-- Start Check Out Button -->
                <li>
                    <hr>
                    <button disabled id="checkOutButton" onclick="goToCheckOutTab()"
                        class="btn btn-primary btn-lg w-100 rounded-pill">CHECK OUT</button>
                </li>
                <!-- End Check Out Button -->

            </ul>
            <!-- End Footer -->

        </div>
    </div>
</div>
