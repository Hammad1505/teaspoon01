<?php
/**
 * Tea Spoon Restro and Cafe - Main Landing Page
 * Premium One-Page Restaurant Website
 */
session_start();
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tea Spoon Restro and Cafe - Delicious North Indian & Mughlai Bites in Deen Dayal Puram, Bareilly. Open Daily 11 AM - 11:15 PM. Book Your Table Now!">
    <meta name="keywords" content="restaurant bareilly, north indian food, mughlai cuisine, tea spoon cafe, deen dayal puram restaurant">
    <title>Tea Spoon Restro and Cafe | North Indian & Mughlai in Bareilly</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts - Premium Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Note: Hero background image in CSS uses Unsplash restaurant photo -->
    <!-- Floating 3D Background Shapes -->
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <!-- Floating Action Buttons -->
    <div class="floating-actions">
        <a href="tel:+918006677660" class="fab-btn fab-call" title="Call Now">
            <i class="fas fa-phone-alt"></i>
        </a>
        <a href="https://wa.me/918006677660" target="_blank" class="fab-btn fab-whatsapp" title="WhatsApp Order">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <span class="brand-icon">🍵</span>
                <span class="brand-text">Tea Spoon</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#reviews">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn-cta" href="#order">Order Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-pattern"></div>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-7 hero-content">
                    <div class="rating-badge animate-fade-in">
                        <i class="fas fa-star"></i>
                        <span class="rating-number">4.6</span>
                        <span class="rating-text">Google Rating</span>
                    </div>
                    
                    <h1 class="hero-title animate-slide-up">
                        Welcome to<br>
                        <span class="highlight">Tea Spoon</span><br>
                        Restro & Cafe
                    </h1>
                    
                    <p class="hero-subtitle animate-slide-up delay-1">
                        Delicious North Indian & Mughlai Bites in Deen Dayal Puram, Bareilly
                    </p>
                    
                    <div class="hero-features animate-fade-in delay-2">
                        <div class="feature-item">
                            <i class="fas fa-utensils"></i>
                            <span>Reserve Your Table</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shopping-bag"></i>
                            <span>Order Online</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-door-open"></i>
                            <span>Walk-In Welcome</span>
                        </div>
                    </div>
                    
                    <div class="hero-cta animate-fade-in delay-3">
                        <a href="tel:+918006677660" class="btn btn-primary btn-lg">
                            <i class="fas fa-phone-alt"></i> Call Now
                        </a>
                        <a href="#order" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-whatsapp"></i> Order Online
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <div class="arrow">
                <span></span>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-image-wrapper">
                        <div class="image-decorative-border"></div>
                        <img src="assets/images/restaurant-interior.jpg" alt="Tea Spoon Interior" class="about-image img-fluid">
                        <div class="about-badge">
                            <div class="badge-content">
                                <span class="badge-number">10+</span>
                                <span class="badge-text">Years Serving<br>Bareilly</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header">
                        <span class="section-subtitle">Our Story</span>
                        <h2 class="section-title">About Tea Spoon Restro & Cafe</h2>
                    </div>
                    <p class="about-description">
                        Tea Spoon Restro & Cafe is the go-to destination in Deen Dayal Puram for authentic Mughlai flavors 
                        and classic North Indian favorites. We pride ourselves on serving delicious, freshly prepared meals 
                        in a warm and inviting atmosphere.
                    </p>
                    <p class="about-description">
                        Whether you're looking for a quick lunch, a family dinner, or a casual dining experience with friends, 
                        our comfortable seating and relaxed ambience make every visit memorable. We're open daily till late evening 
                        to serve you better.
                    </p>
                    
                    <div class="features-grid">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>4.6★ Google Rating</h4>
                            <p>Loved by our customers</p>
                        </div>
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4>Family Friendly</h4>
                            <p>Perfect for groups</p>
                        </div>
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                            <h4>Affordable Pricing</h4>
                            <p>Great value for money</p>
                        </div>
                        <div class="feature-box">
                            <div class="feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h4>Prime Location</h4>
                            <p>Near Gangasheel Hospital</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cuisine Types Banner -->
    <section class="cuisine-banner">
        <div class="container">
            <div class="cuisine-items">
                <div class="cuisine-item">
                    <i class="fas fa-fire"></i>
                    <span>North Indian</span>
                </div>
                <div class="cuisine-item">
                    <i class="fas fa-pepper-hot"></i>
                    <span>Mughlai</span>
                </div>
                <div class="cuisine-item">
                    <i class="fas fa-hamburger"></i>
                    <span>Fast Food</span>
                </div>
                <div class="cuisine-item">
                    <i class="fas fa-bread-slice"></i>
                    <span>Sandwiches</span>
                </div>
                <div class="cuisine-item">
                    <i class="fas fa-mug-hot"></i>
                    <span>Beverages</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Highlights Section -->
    <section id="menu" class="menu-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Our Specialties</span>
                <h2 class="section-title">Popular Dishes & Best Sellers</h2>
                <p class="section-description">Discover our most loved dishes, crafted with authentic spices and fresh ingredients</p>
            </div>

            <div class="row g-4">
                <!-- Menu Item 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="assets/images/paneer-butter-masala.jpg" alt="Paneer Butter Masala">
                            <div class="menu-badge">Best Seller</div>
                        </div>
                        <div class="menu-content">
                            <h3>Paneer Butter Masala</h3>
                            <p>Rich, creamy curry with soft paneer cubes in authentic Mughlai gravy</p>
                            <div class="menu-footer">
                                <span class="menu-category"><i class="fas fa-tag"></i> North Indian</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="assets/images/kadai-paneer.jpg" alt="Kadai Paneer">
                            <div class="menu-badge">Chef's Special</div>
                        </div>
                        <div class="menu-content">
                            <h3>Kadai Paneer</h3>
                            <p>Spicy and flavorful paneer cooked with bell peppers and aromatic spices</p>
                            <div class="menu-footer">
                                <span class="menu-category"><i class="fas fa-tag"></i> North Indian</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="assets/images/parathas.jpg" alt="Stuffed Parathas">
                        </div>
                        <div class="menu-content">
                            <h3>Mixed & Stuffed Parathas</h3>
                            <p>Freshly made parathas with various fillings, served with curd and pickle</p>
                            <div class="menu-footer">
                                <span class="menu-category"><i class="fas fa-tag"></i> Breakfast</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="assets/images/veg-platter.jpg" alt="Veg Platter">
                        </div>
                        <div class="menu-content">
                            <h3>Veg Platters & Starters</h3>
                            <p>Assorted tandoori and grilled vegetarian starters perfect for sharing</p>
                            <div class="menu-footer">
                                <span class="menu-category"><i class="fas fa-tag"></i> Starters</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="assets/images/wraps-rolls.jpg" alt="Wraps & Rolls">
                        </div>
                        <div class="menu-content">
                            <h3>Snacks, Wraps & Rolls</h3>
                            <p>Quick bites and wraps packed with flavor, perfect for on-the-go</p>
                            <div class="menu-footer">
                                <span class="menu-category"><i class="fas fa-tag"></i> Fast Food</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="assets/images/beverages.jpg" alt="Beverages">
                        </div>
                        <div class="menu-content">
                            <h3>Beverages & Tea</h3>
                            <p>Hot and cold beverages including our signature masala chai and refreshing drinks</p>
                            <div class="menu-footer">
                                <span class="menu-category"><i class="fas fa-tag"></i> Beverages</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <p class="menu-note">
                    <i class="fas fa-info-circle"></i> 
                    Full menu available in-store and on WhatsApp
                </p>
                <a href="https://wa.me/918006677660?text=Hi!%20I'd%20like%20to%20see%20the%20full%20menu" 
                   target="_blank" 
                   class="btn btn-primary btn-lg">
                    <i class="fab fa-whatsapp"></i> View Full Menu on WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="reviews-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">What Our Customers Say</span>
                <h2 class="section-title">Guest Reviews</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="review-card">
                        <div class="review-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="review-text">"Great food and service — perfect for family dinners!"</p>
                        <div class="review-author">
                            <div class="author-avatar">R</div>
                            <div class="author-info">
                                <h5>Rajesh K.</h5>
                                <span>Regular Customer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="review-card">
                        <div class="review-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="review-text">"Tasty Mughlai mini-meals & quick service — highly recommend."</p>
                        <div class="review-author">
                            <div class="author-avatar">P</div>
                            <div class="author-info">
                                <h5>Priya S.</h5>
                                <span>Food Enthusiast</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="review-card">
                        <div class="review-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="review-text">"Lovely ambience and friendly staff — value for money."</p>
                        <div class="review-author">
                            <div class="author-avatar">A</div>
                            <div class="author-info">
                                <h5>Amit M.</h5>
                                <span>Local Resident</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="review-card">
                        <div class="review-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="review-text">"Best place for North Indian food in the area. The paneer dishes are amazing!"</p>
                        <div class="review-author">
                            <div class="author-avatar">N</div>
                            <div class="author-info">
                                <h5>Neha G.</h5>
                                <span>Verified Diner</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Order & Booking Section -->
    <section id="order" class="order-section section-padding">
        <div class="container">
            <div class="row g-5">
                <!-- Online Food Order -->
                <div class="col-lg-6">
                    <div class="form-wrapper">
                        <div class="form-header">
                            <i class="fas fa-shopping-bag"></i>
                            <h3>Order Food Online</h3>
                            <p>Get your favorite dishes delivered or ready for pickup</p>
                        </div>

                        <form id="orderForm" class="custom-form">
                            <div class="mb-3">
                                <label class="form-label">Your Name *</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" name="phone" required pattern="[0-9]{10}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Select Items *</label>
                                <div class="menu-checklist">
                                    <label class="menu-checkbox">
                                        <input type="checkbox" name="items[]" value="Paneer Butter Masala">
                                        <span>Paneer Butter Masala</span>
                                    </label>
                                    <label class="menu-checkbox">
                                        <input type="checkbox" name="items[]" value="Kadai Paneer">
                                        <span>Kadai Paneer</span>
                                    </label>
                                    <label class="menu-checkbox">
                                        <input type="checkbox" name="items[]" value="Mixed Parathas">
                                        <span>Mixed Parathas</span>
                                    </label>
                                    <label class="menu-checkbox">
                                        <input type="checkbox" name="items[]" value="Veg Platter">
                                        <span>Veg Platter</span>
                                    </label>
                                    <label class="menu-checkbox">
                                        <input type="checkbox" name="items[]" value="Wraps & Rolls">
                                        <span>Wraps & Rolls</span>
                                    </label>
                                    <label class="menu-checkbox">
                                        <input type="checkbox" name="items[]" value="Beverages">
                                        <span>Beverages</span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Special Instructions (Optional)</label>
                                <textarea class="form-control" name="notes" rows="3" placeholder="Any dietary preferences or special requests?"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="fas fa-paper-plane"></i> Place Order
                            </button>
                        </form>

                        <div id="orderMessage" class="alert mt-3" style="display: none;"></div>
                    </div>
                </div>

                <!-- Table Booking -->
                <div class="col-lg-6">
                    <div class="form-wrapper">
                        <div class="form-header">
                            <i class="fas fa-calendar-check"></i>
                            <h3>Reserve Your Table</h3>
                            <p>Book a table for your next dining experience</p>
                        </div>

                        <form id="bookingForm" class="custom-form">
                            <div class="mb-3">
                                <label class="form-label">Your Name *</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" name="phone" required pattern="[0-9]{10}">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date *</label>
                                    <input type="date" class="form-control" name="date" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Time *</label>
                                    <input type="time" class="form-control" name="time" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Number of Guests *</label>
                                <select class="form-control" name="seats" required>
                                    <option value="">Select number of guests</option>
                                    <option value="1">1 Person</option>
                                    <option value="2">2 People</option>
                                    <option value="3">3 People</option>
                                    <option value="4">4 People</option>
                                    <option value="5">5 People</option>
                                    <option value="6">6 People</option>
                                    <option value="7+">7+ People</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Special Occasion (Optional)</label>
                                <input type="text" class="form-control" name="occasion" placeholder="Birthday, Anniversary, etc.">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="fas fa-check-circle"></i> Confirm Booking
                            </button>
                        </form>

                        <div id="bookingMessage" class="alert mt-3" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Location Section -->
    <section id="contact" class="contact-section section-padding">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-subtitle">Visit Us</span>
                <h2 class="section-title">Location & Contact</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="contact-info-wrapper">
                        <div class="contact-info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Address</h4>
                                <p>P3, 2, Opposite Gangasheel Hospital,<br>
                                   Deen Dayal Puram, Bareilly,<br>
                                   Uttar Pradesh 243122, India</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Phone</h4>
                                <p><a href="tel:+918006677660">+91 80066 77660</a></p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h4>Business Hours</h4>
                                <p>Open Daily<br>11:00 AM – 11:15 PM</p>
                            </div>
                        </div>

                        <div class="contact-buttons">
                            <a href="https://maps.google.com/?q=Tea+Spoon+Restro+Cafe+Bareilly" 
                               target="_blank" 
                               class="btn btn-outline-primary">
                                <i class="fas fa-directions"></i> Get Directions
                            </a>
                            <a href="https://wa.me/918006677660" 
                               target="_blank" 
                               class="btn btn-primary">
                                <i class="fab fa-whatsapp"></i> Chat on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="map-wrapper">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3563.1234567890!2d79.4200000!3d28.3600000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDIxJzM2LjAiTiA3OcKwMjUnMTIuMCJF!5e0!3m2!1sen!2sin!4v1234567890" 
                            width="100%" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="cta-banner">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">HUNGRY NOW?</h2>
                <p class="cta-subtitle">Walk-ins Welcome • Quick Service Guaranteed</p>
                <div class="cta-buttons">
                    <a href="tel:+918006677660" class="btn btn-light btn-lg">
                        <i class="fas fa-phone-alt"></i> Click to Call
                    </a>
                    <a href="https://wa.me/918006677660" target="_blank" class="btn btn-outline-light btn-lg">
                        <i class="fab fa-whatsapp"></i> WhatsApp Order
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h4 class="footer-brand">
                        <span class="brand-icon">🍵</span> Tea Spoon Restro & Cafe
                    </h4>
                    <p>Your favorite destination for authentic North Indian and Mughlai cuisine in Bareilly.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#order">Order Online</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="footer-title">Contact Info</h5>
                    <ul class="footer-contact">
                        <li><i class="fas fa-phone-alt"></i> +91 80066 77660</li>
                        <li><i class="fas fa-map-marker-alt"></i> Deen Dayal Puram, Bareilly</li>
                        <li><i class="fas fa-clock"></i> Daily: 11 AM - 11:15 PM</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Tea Spoon Restro and Cafe. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>
</html>
