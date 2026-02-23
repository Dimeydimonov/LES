document.addEventListener('DOMContentLoaded', function() {
    // Modal functions
    window.openCartModal = function() {
        document.getElementById('cartModal').classList.add('show');
    };

    window.closeCartModal = function() {
        document.getElementById('cartModal').classList.remove('show');
    };

    // Close modal on ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeCartModal();
        }
    });

    // Cart functionality
    const cartForms = document.querySelectorAll('.add-to-cart-form');
    const cartModal = document.getElementById('cartModal');
    const cartBody = cartModal ? cartModal.querySelector('.modal-body') : null;
    
    // Add to cart AJAX
    cartForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('.btn-add-to-cart');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Adding...';
            submitBtn.disabled = true;
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                   document.querySelector('input[name="_token"]')?.value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showNotification(data.message, 'success');
                    
                    // Update cart count
                    updateCartCount(data.cart_count);
                    
                    // Update cart modal if open
                    if (cartModal && cartModal.classList.contains('show')) {
                        loadCartContent();
                    }
                } else {
                    showNotification(data.message || 'Error adding item to cart', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error adding item to cart', 'error');
            })
            .finally(() => {
                // Restore button state
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    });
    
    // Load cart content
    function loadCartContent() {
        if (!cartBody) return;
        
        fetch('/cart/view', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                cartBody.innerHTML = data.html;
            }
        })
        .catch(error => {
            console.error('Error loading cart:', error);
            cartBody.innerHTML = '<p>Error loading cart content</p>';
        });
    }
    
    // Update cart count in header
    function updateCartCount(count) {
        const cartCountElements = document.querySelectorAll('.cart-count');
        cartCountElements.forEach(element => {
            element.textContent = count;
            element.style.display = count > 0 ? 'inline' : 'none';
        });
    }
    
    // Show notification
    function showNotification(message, type = 'success') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notif => notif.remove());
        
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        // Style the notification
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '12px 20px',
            backgroundColor: type === 'success' ? '#28a745' : '#dc3545',
            color: 'white',
            borderRadius: '4px',
            zIndex: '9999',
            fontSize: '14px',
            boxShadow: '0 2px 10px rgba(0,0,0,0.1)'
        });
        
        document.body.appendChild(notification);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
    
    // Remove from cart
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove-from-cart')) {
            e.preventDefault();
            
            const productId = e.target.dataset.productId;
            
            fetch('/cart/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                   document.querySelector('input[name="_token"]')?.value,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    product_id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification(data.message, 'success');
                    updateCartCount(data.cart_count);
                    loadCartContent();
                } else {
                    showNotification(data.message || 'Error removing item', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error removing item from cart', 'error');
            });
        }
    });
    
    // Load cart content when modal opens
    const cartModalElements = document.querySelectorAll('#cartModal');
    cartModalElements.forEach(modal => {
        if (modal) {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        if (modal.classList.contains('show')) {
                            loadCartContent();
                        }
                    }
                });
            });
            observer.observe(modal, { attributes: true });
        }
    });
});
