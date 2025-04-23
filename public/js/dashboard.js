function loadScriptDynamically(src, callback) {
    if ($(`script[src="${src}"]`).length > 0) {
        if (typeof callback === 'function') callback();
        return;
    }

    const script = document.createElement('script');
    script.src = src;
    script.onload = callback;
    document.body.appendChild(script);
}

$(document).ready(function () {
    function loadContent($link) {
        const url = $link.data('url');
        const script = $link.data('script');
    
        $('.sidebar-menu li').removeClass('active');
        $link.closest('li').addClass('active');
    
        $('#ajaxLoader').fadeIn(100);
    
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('.dashboard-content').html(response);
    
                const scriptPath = `/js/${script}.partials.js`;
    
                loadScriptDynamically(scriptPath, function () {
                    // ✅ wait for DOM content + script, THEN run init
                    const interval = setInterval(() => {
                        if ($('.dashboard-content .stat-number').length > 0) {
                            clearInterval(interval);
    
                            if (typeof window[`init_${script}_js`] === 'function') {
                                window[`init_${script}_js`]();
                            }
                        }
                    }, 50);
                });
            },
            error: function () {
                $('.dashboard-content').html('<div class="error-msg">Error loading content. Please try again.</div>');
            },
            complete: function () {
                $('#ajaxLoader').fadeOut(100);
            }
        });
    }    

    // Sidebar click handler
    $('.sidebar-link').on('click', function (e) {
        e.preventDefault();
        loadContent($(this));
    });

    // Automatically load dashboard by default on page load
    const $defaultLink = $('.sidebar-link[data-script="dashboard"]');
    if ($defaultLink.length) {
        loadContent($defaultLink);
    }
});
