/**
 * Tea Spoon Restro and Cafe - Main JavaScript
 * Handles all client-side interactions and AJAX requests
 */

(function() {
    'use strict';

    // ==================== Navbar Scroll Effect ====================
    const navbar = document.getElementById('mainNav');
    
    function handleNavbarScroll() {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', handleNavbarScroll);

    // ==================== Smooth Scroll for Navigation ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse.classList.contains('show')) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                        bsCollapse.hide();
                    }
                }
            }
        });
    });

    // ==================== Set Minimum Date for Booking ====================
    const dateInput = document.querySelector('input[type="date"]');
    if (dateInput) {
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        const minDate = tomorrow.toISOString().split('T')[0];
        dateInput.setAttribute('min', minDate);
    }

    // ==================== Online Food Order Form ====================
    const orderForm = document.getElementById('orderForm');
    const orderMessage = document.getElementById('orderMessage');

    if (orderForm) {
        orderForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(orderForm);
            
            // Validate at least one item selected
            const selectedItems = formData.getAll('items[]');
            if (selectedItems.length === 0) {
                showMessage(orderMessage, 'danger', 'Please select at least one item to order.');
                return;
            }
            
            // Get submit button
            const submitBtn = orderForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.classList.add('loading');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            
            try {
                // Send AJAX request
                const response = await fetch('order/process_order.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showMessage(orderMessage, 'success', data.message);
                    orderForm.reset();
                    
                    // Optional: Redirect to WhatsApp after 2 seconds
                    setTimeout(() => {
                        const phone = '918006677660';
                        const message = encodeURIComponent(`Hi! I just placed an order for: ${selectedItems.join(', ')}. Order confirmation sent to ${formData.get('phone')}.`);
                        window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
                    }, 2000);
                } else {
                    showMessage(orderMessage, 'danger', data.message || 'Failed to place order. Please try again.');
                }
            } catch (error) {
                console.error('Order Error:', error);
                showMessage(orderMessage, 'danger', 'An error occurred. Please try again or call us directly.');
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.classList.remove('loading');
                submitBtn.innerHTML = originalText;
            }
        });
    }

    // ==================== Table Booking Form ====================
    const bookingForm = document.getElementById('bookingForm');
    const bookingMessage = document.getElementById('bookingMessage');

    if (bookingForm) {
        bookingForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(bookingForm);
            
            // Validate date is not in the past
            const selectedDate = new Date(formData.get('date'));
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (selectedDate < today) {
                showMessage(bookingMessage, 'danger', 'Please select a future date for your booking.');
                return;
            }
            
            // Get submit button
            const submitBtn = bookingForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.classList.add('loading');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Confirming...';
            
            try {
                // Send AJAX request
                const response = await fetch('booking/process_booking.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showMessage(bookingMessage, 'success', data.message);
                    bookingForm.reset();
                    
                    // Show additional confirmation
                    setTimeout(() => {
                        showMessage(bookingMessage, 'success', 
                            `${data.message}<br><br><strong>Booking Details:</strong><br>` +
                            `Date: ${formData.get('date')}<br>` +
                            `Time: ${formData.get('time')}<br>` +
                            `Guests: ${formData.get('seats')}<br><br>` +
                            `We'll call you to confirm. See you soon!`
                        );
                    }, 1000);
                } else {
                    showMessage(bookingMessage, 'danger', data.message || 'Failed to book table. Please try again.');
                }
            } catch (error) {
                console.error('Booking Error:', error);
                showMessage(bookingMessage, 'danger', 'An error occurred. Please try again or call us directly.');
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.classList.remove('loading');
                submitBtn.innerHTML = originalText;
            }
        });
    }

    // ==================== Helper: Show Message ====================
    function showMessage(element, type, message) {
        element.className = `alert alert-${type}`;
        element.innerHTML = message;
        element.style.display = 'block';
        
        // Auto-hide after 8 seconds
        setTimeout(() => {
            element.style.display = 'none';
        }, 8000);
        
        // Scroll to message
        element.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // ==================== Scroll Animations ====================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe elements for scroll animations
    document.querySelectorAll('.menu-card, .review-card, .feature-box, .contact-info-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // ==================== Floating Action Button Visibility ====================
    const floatingActions = document.querySelector('.floating-actions');
    
    function handleFloatingButtons() {
        if (window.scrollY > 300) {
            floatingActions.style.opacity = '1';
            floatingActions.style.visibility = 'visible';
        } else {
            floatingActions.style.opacity = '0';
            floatingActions.style.visibility = 'hidden';
        }
    }
    
    // Initial state
    floatingActions.style.transition = 'opacity 0.3s ease, visibility 0.3s ease';
    floatingActions.style.opacity = '0';
    floatingActions.style.visibility = 'hidden';
    
    window.addEventListener('scroll', handleFloatingButtons);

    // ==================== Phone Number Validation ====================
    document.querySelectorAll('input[type="tel"]').forEach(input => {
        input.addEventListener('input', function(e) {
            // Remove non-numeric characters
            this.value = this.value.replace(/[^0-9]/g, '');
            
            // Limit to 10 digits
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }
        });
        
        input.addEventListener('blur', function(e) {
            // Validate on blur
            if (this.value.length > 0 && this.value.length !== 10) {
                this.setCustomValidity('Please enter a valid 10-digit phone number');
                this.reportValidity();
            } else {
                this.setCustomValidity('');
            }
        });
    });

    // ==================== Form Field Focus Effects ====================
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });

    // ==================== Active Navigation Highlighting ====================
    window.addEventListener('scroll', () => {
        const sections = document.querySelectorAll('section[id]');
        const scrollY = window.pageYOffset;

        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');
            const navLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);

            if (navLink && scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active');
                });
                navLink.classList.add('active');
            }
        });
    });

    // ==================== Prevent Multiple Form Submissions ====================
    let formSubmitting = false;
    
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (formSubmitting) {
                e.preventDefault();
                return false;
            }
            formSubmitting = true;
            
            // Reset after 3 seconds
            setTimeout(() => {
                formSubmitting = false;
            }, 3000);
        });
    });

    // ==================== Lazy Load Images ====================
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // ==================== Print Welcome Message ====================
    console.log('%c🍵 Tea Spoon Restro & Cafe', 'font-size: 24px; font-weight: bold; color: #C17817;');
    console.log('%cWebsite developed with care • Premium PHP + MySQL Solution', 'font-size: 12px; color: #666;');

})();
