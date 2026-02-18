<!-- Модальное окно -->
<div id="cartModal" class="custom-modal">
    <div class="modal-overlay" onclick="closeCartModal()"></div>
    <div class="modal-content">
        <div class="modal-header">
            <h3>Shopping Cart</h3>
            <button class="close-btn" onclick="closeCartModal()">&times;</button>
        </div>
        <div class="modal-body">
            <div class="cart-loading">
                <i class="fa fa-spinner fa-spin"></i>
                Loading cart...
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeCartModal()">Close</button>
            <button class="btn btn-primary">Checkout</button>
        </div>
    </div>
</div>
