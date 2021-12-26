<div class="modal fade" id="amountcalculator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <input id="calculatorScreenAmount" type="text"
                    class="mb-3 bg-dark w-100 text-end form-control form-control-lg text-white" disabled value="0">
                <input id="calculatorScreenValue" type="text" value="0" hidden>

                <div class="row">
                    <div class="col-4 mb-3" onclick="calculatorInsert('9')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">9</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('8')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">8</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('7')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">7</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('6')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">6</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('5')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">5</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('4')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">4</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('3')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">3</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('2')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">2</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('1')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">1</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('0')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">0</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('00')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">00</button></div>
                    <div class="col-4 mb-3" onclick="calculatorInsert('000')"><button
                            class="btn w-100 rounded-pill text-center btn-outline-dark">000</button></div>
                    <div class="col-4 mb-3" onclick="calculatorCancel()"><button
                            class="btn w-100 rounded-pill text-center btn-danger">Kosongkan</button></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-3"><button onclick="exactAmountButton()"
                            class="btn w-100 rounded-pill text-center btn-warning">Uang pas (Rp.<span
                                id="exactAmountSpan"></span>)</button>
                    </div>
                    <div class="col-3 mb-3"><button onclick="denominationButton(1000)"
                            class="btn w-100 rounded-pill text-center btn-warning">Rp 1,000</button></div>
                    <div class="col-3 mb-3"><button onclick="denominationButton(2000)"
                            class="btn w-100 rounded-pill text-center btn-warning">Rp. 2,000</button></div>
                    <div class="col-3 mb-3"><button onclick="denominationButton(5000)"
                            class="btn w-100 rounded-pill text-center btn-warning">Rp. 5,000</button></div>
                    <div class="col-4 mb-3"><button onclick="denominationButton(10000)"
                            class="btn w-100 rounded-pill text-center btn-warning">Rp. 10,000</button></div>
                    <div class="col-4 mb-3"><button onclick="denominationButton(20000)"
                            class="btn w-100 rounded-pill text-center btn-warning">Rp. 20,000</button></div>
                    <div class="col-4 mb-3"><button onclick="denominationButton(50000)"
                            class="btn w-100 rounded-pill text-center btn-warning">Rp. 50,000</button></div>
                    <div class="col-5 mb-3"><button onclick="denominationButton(100000)"
                            class="btn w-100 rounded-pill text-center btn-warning">Rp. 100,000</button></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="calculatorCancel()" class="btn btn-secondary"
                    data-bs-dismiss="modal">Tutup</button>
                <button type="button" onclick="confirmPaidButton()" id="confirmPaid" class="btn btn-primary"
                    data-bs-dismiss="modal">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
