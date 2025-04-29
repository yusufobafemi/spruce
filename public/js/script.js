// Initialize AOS (Animate On Scroll)
const CUSTOM_TOAST_CONFIG = {
    duration: 5000, // Default duration in ms
    maxToasts: 4, // Maximum number of toasts shown at once
    icons: {
        info: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4a6cf7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg>`,
        success: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>`,
        error: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>`,
        warning: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>`
    }
};

let customToastCounter = 0;

function showCustomToast(type, title, message, duration = CUSTOM_TOAST_CONFIG.duration) {
    const toastContainer = $('#customToastContainer');
    
    // Remove older toasts if necessary
    if (toastContainer.children().length >= CUSTOM_TOAST_CONFIG.maxToasts) {
        removeCustomToast(toastContainer.children().first().attr('id'));
    }

    // Create a unique ID for this toast
    const toastId = `custom-toast-${customToastCounter++}`;

    // Create the toast element
    const toast = $(`
        <div class="custom-toast custom-toast-${type}" id="${toastId}">
            <div class="custom-toast-icon">${CUSTOM_TOAST_CONFIG.icons[type]}</div>
            <div class="custom-toast-content">
                <h4 class="custom-toast-title">${title}</h4>
                <p class="custom-toast-message">${message}</p>
            </div>
            <button class="custom-toast-close">&times;</button>
            <div class="custom-toast-progress">
                <div class="custom-toast-progress-bar"></div>
            </div>
        </div>
    `);

    // Append the toast to the container
    toastContainer.append(toast);

    // Trigger a reflow to ensure transition works
    toast[0].offsetHeight; 

    // Show the toast with a slight delay
    setTimeout(() => {
        toast.addClass('custom-toast-show');
    }, 10);

    // Animate the progress bar
    const progressBar = toast.find('.custom-toast-progress-bar');
    progressBar.css('transition', `width ${duration}ms linear`);
    
    setTimeout(() => {
        progressBar.css('width', '0%');
    }, 10);

    // Auto-remove the toast after the duration
    const timeoutId = setTimeout(() => {
        removeCustomToast(toastId);
    }, duration);

    // Store the timeout ID for potential cancellation
    toast.data('timeoutId', timeoutId);

    // Close button functionality
    toast.find('.custom-toast-close').on('click', function() {
        removeCustomToast(toastId);
    });
}

function removeCustomToast(toastId) {
    const toast = $(`#${toastId}`);
    if (toast.length === 0) return;

    // Clear any pending timeout
    clearTimeout(toast.data('timeoutId'));

    // Hide the toast
    toast.removeClass('custom-toast-show');

    // Remove from DOM after animation completes
    setTimeout(() => {
        toast.remove();
    }, 500); // Match this timing with the CSS transition
}
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: false,
        mirror: true
    });

    // Mobile Menu Toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileCloseBtn = document.querySelector('.mobile-close-btn');
    const navLinks = document.querySelector('.nav-links');

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            document.body.classList.toggle('no-scroll');
        });
    }

    // Close menu with X button
    if (mobileCloseBtn) {
        mobileCloseBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.remove('active');
            navLinks.classList.remove('active');
            menuOverlay.classList.remove('active');
            document.body.classList.remove('no-scroll');
        });
    }
    
    // Close mobile menu when clicking on a link
    const navLinksItems = document.querySelectorAll('.nav-links a');
    navLinksItems.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenuBtn.classList.remove('active');
            navLinks.classList.remove('active');
            menuOverlay.classList.remove('active');
            document.body.classList.remove('no-scroll');
        });
    });
    
    // Close menu when clicking on overlay
    menuOverlay.addEventListener('click', () => {
        mobileMenuBtn.classList.remove('active');
        navLinks.classList.remove('active');
        menuOverlay.classList.remove('active');
        document.body.classList.remove('no-scroll');
    });
    
    // Close menu on escape key press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && navLinks.classList.contains('active')) {
            mobileMenuBtn.classList.remove('active');
            navLinks.classList.remove('active');
            menuOverlay.classList.remove('active');
            document.body.classList.remove('no-scroll');
        }
    });

    // Header scroll effect
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Intersection Observer for enhanced scroll animations
    const observerOptions = {
        root: null,
        threshold: 0.1,
        rootMargin: "0px"
    };

    const handleIntersect = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    };

    const observer = new IntersectionObserver(handleIntersect, observerOptions);
    const sections = document.querySelectorAll('section');
    
    sections.forEach(section => {
        observer.observe(section);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const headerOffset = document.querySelector('header').offsetHeight;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                
                window.scrollTo({
                    top: targetPosition - headerOffset,
                    behavior: 'smooth'
                });
            }
        });
    });
});

$(document).ready(function () {

    // Event listeners for buttons (demo)
    $('#toastDemoInfoBtn').on('click', function() {
        showCustomToast('info', 'Info Message', 'This is a simple information message');
    });
    
    $('#toastDemoSuccessBtn').on('click', function() {
        showCustomToast('success', 'Success!', 'Your action was completed successfully');
    });

    $('#toastDemoErrorBtn').on('click', function() {
        showCustomToast('error', 'Error!', 'Something went wrong. Please try again');
    });

    $('#toastDemoWarningBtn').on('click', function() {
        showCustomToast('warning', 'Warning!', 'This action might cause issues');
    });
    $('#newsletter-form').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        const url = form.attr('action');
        const formData = form.serialize();
        const submitButton = form.find('button[type="submit"]');

        // Backup original button content
        const originalBtnHtml = submitButton.html();

        // Disable button and show loader
        submitButton.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
        
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (response) {
                // form.find('.form-message').html(`<div class="alert alert-success">${response.message}</div>`);
                showCustomToast('success', 'Success!', response.message);
                form[0].reset();
            },
            error: function (xhr) {
                const message = xhr.responseJSON?.message || 'Something went wrong';
                // form.find('.form-message').html(`<div class="alert alert-danger">${message}</div>`);
                showCustomToast('error', 'Error!', message);
            },
            complete: function () {
                // Restore button after response
                submitButton.prop('disabled', false).html(originalBtnHtml);
            }
        });
    });
});

