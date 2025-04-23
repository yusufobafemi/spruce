// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Toast configuration
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

    // Toast counter for unique IDs
    let customToastCounter = 0;

    // Function to show a toast notification
    function showCustomToast(type, title, message, duration = CUSTOM_TOAST_CONFIG.duration) {
      const toastContainer = document.getElementById('customToastContainer');
      
      // Check if we need to remove older toasts
      if (toastContainer.children.length >= CUSTOM_TOAST_CONFIG.maxToasts) {
        removeCustomToast(toastContainer.children[0].id);
      }
      
      // Create a unique ID for this toast
      const toastId = `custom-toast-${customToastCounter++}`;
      
      // Create toast element
      const toast = document.createElement('div');
      toast.className = `custom-toast custom-toast-${type}`;
      toast.id = toastId;
      
      // Create toast content
      toast.innerHTML = `
        <div class="custom-toast-icon">${CUSTOM_TOAST_CONFIG.icons[type]}</div>
        <div class="custom-toast-content">
          <h4 class="custom-toast-title">${title}</h4>
          <p class="custom-toast-message">${message}</p>
        </div>
        <button class="custom-toast-close" onclick="removeCustomToast('${toastId}')">&times;</button>
        <div class="custom-toast-progress">
          <div class="custom-toast-progress-bar"></div>
        </div>
      `;
      
      // Add the toast to the container
      toastContainer.appendChild(toast);
      
      // Trigger a reflow to enable the transition
      toast.offsetHeight;
      
      // Show the toast
      setTimeout(() => {
        toast.classList.add('custom-toast-show');
      }, 10);
      
      // Animate the progress bar
      const progressBar = toast.querySelector('.custom-toast-progress-bar');
      progressBar.style.transition = `width ${duration}ms linear`;
      
      // Start the animation after a small delay to ensure CSS transition works
      setTimeout(() => {
        progressBar.style.width = '0%';
      }, 10);
      
      // Auto remove the toast after duration
      const timeoutId = setTimeout(() => {
        removeCustomToast(toastId);
      }, duration);
      
      // Store the timeout ID on the toast for later cancellation if needed
      toast.dataset.timeoutId = timeoutId;
    }

    // Function to remove a toast notification - make it global for access from HTML
    window.removeCustomToast = function(toastId) {
      const toast = document.getElementById(toastId);
      if (!toast) return;
      
      // Clear any pending timeout
      clearTimeout(toast.dataset.timeoutId);
      
      // Hide the toast
      toast.classList.remove('custom-toast-show');
      
      // Remove from DOM after animation completes
      setTimeout(() => {
        if (toast.parentNode) {
          toast.parentNode.removeChild(toast);
        }
      }, 500); // Match this timing with the CSS transition
    };

    // Set up button click event listeners
    document.getElementById('toastDemoInfoBtn').addEventListener('click', function() {
      showCustomToast('info', 'Info Message', 'This is a simple information message');
    });
    
    document.getElementById('toastDemoSuccessBtn').addEventListener('click', function() {
      showCustomToast('success', 'Success!', 'Your action was completed successfully');
    });
    
    document.getElementById('toastDemoErrorBtn').addEventListener('click', function() {
      showCustomToast('error', 'Error!', 'Something went wrong. Please try again');
    });
    
    document.getElementById('toastDemoWarningBtn').addEventListener('click', function() {
      showCustomToast('warning', 'Warning!', 'This action might cause issues');
    });
  });