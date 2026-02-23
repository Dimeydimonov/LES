document.addEventListener('DOMContentLoaded', function() {
    // Progressive Enhancement: Mark JS as available and show cart button
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.setAttribute('data-js-enhanced', 'true');
    });
    
    // Show cart button when JavaScript is available
    const cartButton = document.querySelector('.js-cart-button');
    if (cartButton) {
        cartButton.style.display = 'inline-block';
    }
    
    // Modal functions
    window.openCartModal = function() {
        const modal = document.getElementById('cartModal');
        modal.classList.add('show');
        loadCartContent();
    };

    window.closeCartModal = function() {
        document.getElementById('cartModal').classList.remove('show');
    };

    // Event delegation for modal controls
    document.addEventListener('click', function(event) {
        const action = event.target.dataset.action;
        
        if (action === 'open-modal') {
            event.preventDefault();
            openCartModal();
        } else if (action === 'close-modal') {
            event.preventDefault();
            closeCartModal();
        }
    });

    // Close modal on ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeCartModal();
        }
    });

    // Close modal on overlay click (fallback)
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal-overlay')) {
            closeCartModal();
        }
    });

    // Simple cart content loader
    function loadCartContent() {
        const cartBody = document.querySelector('#cartModal .modal-body');
        if (!cartBody) return;
        
        cartBody.innerHTML = '<div class="cart-loading"><i class="fa fa-spinner fa-spin"></i>Loading cart...</div>';
        
        // Simple form submission approach
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/cart/view';
        
        // Add CSRF token
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfInput);
        
        // Add AJAX header
        const ajaxInput = document.createElement('input');
        ajaxInput.type = 'hidden';
        ajaxInput.name = 'X-Requested-With';
        ajaxInput.value = 'XMLHttpRequest';
        form.appendChild(ajaxInput);
        
        // Submit form and capture response
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                cartBody.innerHTML = data.html;
                updateCartCount(data.cart_count);
            } else {
                cartBody.innerHTML = '<p style="text-align: center; padding: 20px; color: red;">Error loading cart</p>';
            }
        })
        .catch(error => {
            console.error('Cart load error:', error);
            cartBody.innerHTML = '<p style="text-align: center; padding: 20px; color: red;">Failed to load cart</p>';
        });
    }

    // Update cart count
    function updateCartCount(count) {
        const cartCountElements = document.querySelectorAll('.cart-count');
        cartCountElements.forEach(element => {
            element.textContent = count;
            element.style.display = count > 0 ? 'inline' : 'none';
        });
    }

    // Update cart summary
    function updateCartSummary() {
        const cartItems = document.querySelectorAll('.cart-item');
        let total = 0;
        
        cartItems.forEach(item => {
            const priceText = item.querySelector('.cart-item-total')?.textContent;
            if (priceText) {
                const price = parseFloat(priceText.replace('$', ''));
                total += price;
            }
        });
        
        const totalElement = document.querySelector('.cart-total strong:last-child');
        if (totalElement) {
            totalElement.textContent = '$' + total.toFixed(2);
        }
    }

    // Add to cart forms - Progressive Enhancement
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('.btn-add-to-cart');
            const originalText = submitBtn ? submitBtn.innerHTML : 'Add to Cart';
            
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Adding...';
                submitBtn.disabled = true;
            }



// Clean AJAX implementation
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification(data.message, 'success');
                    updateCartCount(data.cart_count);
                } else {
                    showNotification(data.message || 'Error adding item', 'error');
                }
            })
            .catch(error => {
                console.error('Add to cart error:', error);
                showNotification('Error adding item to cart', 'error');
            })
            .finally(() => {
                if (submitBtn) {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            });
        });
    });

    // Remove from cart
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove-from-cart') || e.target.closest('.btn-remove-from-cart')) {
            e.preventDefault();
            
            const btn = e.target.classList.contains('btn-remove-from-cart') ? e.target : e.target.closest('.btn-remove-from-cart');
            const productId = btn.dataset.productId;
            
            console.log('Remove button clicked:', btn);
            console.log('Product ID:', productId);
            
            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            console.log('Form data:', Object.fromEntries(formData));



// Clean AJAX implementation
            fetch('/cart/remove', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })








            .then(response => response.json())
            .then(data => {
                console.log('Server response:', data);
                console.log('Success:', data.success);
                console.log('Message:', data.message);
                console.log('Cart count:', data.cart_count);
                
                if (data.success) {
                    showNotification(data.message, 'success');
                    updateCartCount(data.cart_count);
                    
                    // Проверяем находимся ли на странице корзины
                    const isCartPage = window.location.pathname.includes('/cart') || 
                                     document.body.classList.contains('cart-page') ||
                                     document.querySelector('.cart-page') !== null;
                    
                    console.log('Is cart page (click handler):', isCartPage, 'Current path:', window.location.pathname);
                    
                    if (isCartPage) {
                        // Пробуем удалить элемент из DOM немедленно
                        const cartItem = btn.closest('.cart-item');
                        console.log('Cart item element:', cartItem);
                        
                        if (cartItem) {
                            cartItem.remove();
                            console.log('Cart item removed from DOM');
                            
                            // Обновляем итоговую сумму
                            updateCartSummary();
                            
                            // Если корзина пуста, показываем сообщение
                            const remainingItems = document.querySelectorAll('.cart-item');
                            console.log('Remaining items:', remainingItems.length);
                            
                            if (remainingItems.length === 0) {
                                location.reload(); // Перезагрузим чтобы показать пустую корзину
                            }
                        } else {
                            console.log('Reloading cart page...');
                            location.reload();
                        }
                    } else {
                        loadCartContent(); // Reload modal cart
                    }
                } else {
                    showNotification(data.message || 'Error removing item', 'error');
                }
            })
            .catch(error => {
                console.error('Remove from cart error:', error);
                showNotification('Error removing item', 'error');
            });
        }
    });

    // Handle cart remove form submissions
    document.addEventListener('submit', function(e) {
        if (e.target.classList.contains('cart-remove-form')) {
            e.preventDefault();
            
            const btn = e.target.querySelector('.btn-remove-from-cart');
            const productId = btn.dataset.productId;
            
            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            fetch('/cart/remove', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification(data.message, 'success');
                    updateCartCount(data.cart_count);
                    
                    // Проверяем находимся ли на странице корзины
                    const isCartPage = window.location.pathname.includes('/cart') || 
                                     document.body.classList.contains('cart-page') ||
                                     document.querySelector('.cart-page') !== null;
                    
                    console.log('Is cart page:', isCartPage, 'Current path:', window.location.pathname);
                    
                    if (isCartPage) {
                        // Пробуем удалить элемент из DOM немедленно
                        const cartItem = btn.closest('.cart-item');
                        if (cartItem) {
                            cartItem.remove();
                            console.log('Cart item removed from DOM');
                            
                            // Обновляем итоговую сумму
                            updateCartSummary();
                            
                            // Если корзина пуста, показываем сообщение
                            const remainingItems = document.querySelectorAll('.cart-item');
                            if (remainingItems.length === 0) {
                                location.reload(); // Перезагрузим чтобы показать пустую корзину
                            }
                        } else {
                            console.log('Reloading cart page...');
                            location.reload();
                        }
                    } else {
                        console.log('Reloading modal cart...');
                        loadCartContent(); // Reload modal cart
                    }
                } else {
                    showNotification(data.message || 'Error removing item', 'error');
                }
            })
            .catch(error => {
                console.error('Remove from cart error:', error);
                showNotification('Error removing item', 'error');
            });
        }
    });

    // Show notification
    function showNotification(message, type = 'success') {
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notif => notif.remove());
        
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
});
