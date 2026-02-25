<!-- Модальное окно -->
<div id="cartModal" class="custom-modal">
    <div class="modal-overlay" data-action="close-modal"></div>
    <div class="modal-content">
        <div class="modal-header">
            <h3>Корзина</h3>
            <button class="close-btn" data-action="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="cart-loading">
                <i class="fa fa-spinner fa-spin"></i>
                Корзина загружается...
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-action="close-modal">Продолжить покупки  </button>
            <button class="btn btn-primary">Оформить </button>
            <button class="btn btn-clear-cart" data-action="{{route('cart.clear')}}">Очистить корзину </button>
        </div>
    </div>
</div>
