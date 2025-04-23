$(document).ready(function () {
    // Handle sidebar link clicks
    $('.sidebar-link').on('click', function (e) {
        e.preventDefault();

        // Remove active class from all links and add to clicked link
        $('.sidebar-link').parent().removeClass('active');
        $(this).parent().addClass('active');

        // Get section to load
        var section = $(this).data('section');

        // Make AJAX request
        $.ajax({
            url: '/admin/dashboard/section/' + section,
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            success: function (data) {
                if (data.success) {
                    $('.main-content').html(data.html);
                    initializeCharts(); // Reinitialize charts or any JS
                } else {
                    console.error('Error:', data.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    });

    // Function to reinitialize charts or other JS
    function initializeCharts() {
        if ($('#visitorChart').length) {
            new Chart(document.getElementById('visitorChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                    datasets: [{
                        label: 'Visitors',
                        data: [1200, 1900, 3000, 5000],
                        borderColor: '#007bff',
                        fill: false
                    }]
                }
            });
        }
    }
});
