// Initialize all charts
function initCharts() {
    // Visitor traffic chart
    const visitorCtx = document.getElementById('visitorChart').getContext('2d');
    const visitorChart = new Chart(visitorCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [
                {
                    label: 'This Week',
                    data: [1200, 1900, 1500, 2500, 2200, 3000, 2400],
                    borderColor: '#5A1273',
                    backgroundColor: 'rgba(90, 18, 115, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#5A1273',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                },
                {
                    label: 'Last Week',
                    data: [1000, 1500, 1200, 1800, 2000, 2400, 2100],
                    borderColor: '#D6A520',
                    backgroundColor: 'rgba(214, 165, 32, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#D6A520',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 6
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#1A1A1A',
                    bodyColor: '#1A1A1A',
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    padding: 10,
                    boxPadding: 5,
                    usePointStyle: true,
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y.toLocaleString() + ' visitors';
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    },
                    ticks: {
                        callback: function(value) {
                            if (value >= 1000) {
                                return (value / 1000) + 'k';
                            }
                            return value;
                        }
                    }
                }
            },
            interaction: {
                mode: 'index',
                intersect: false
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });

    // Conversion funnel chart
    const conversionCtx = document.getElementById('conversionChart').getContext('2d');
    const conversionChart = new Chart(conversionCtx, {
        type: 'bar',
        data: {
            labels: ['Visitors', 'Clicks', 'Downloads', 'Subscribers'],
            datasets: [{
                data: [24859, 12430, 8742, 5621],
                backgroundColor: [
                    '#5A1273',
                    '#8A4EAB',
                    '#D6A520',
                    '#F0C259'
                ],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#1A1A1A',
                    bodyColor: '#1A1A1A',
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    padding: 10,
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    },
                    ticks: {
                        callback: function(value) {
                            if (value >= 1000) {
                                return (value / 1000) + 'k';
                            }
                            return value;
                        }
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });

    // Devices chart
    const devicesCtx = document.getElementById('devicesChart').getContext('2d');
    const devicesChart = new Chart(devicesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Mobile', 'Desktop', 'Tablet'],
            datasets: [{
                data: [68, 24, 8],
                backgroundColor: [
                    '#5A1273',
                    '#D6A520',
                    '#1976D2'
                ],
                borderWidth: 0,
                hoverOffset: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.9)',
                    titleColor: '#1A1A1A',
                    bodyColor: '#1A1A1A',
                    borderColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 1,
                    padding: 10,
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.parsed + '%';
                        }
                    }
                }
            },
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });

    // Store charts in global variable for dark mode updates
    window.appCharts = {
        visitorChart,
        conversionChart,
        devicesChart
    };
}

// Animate stat numbers with counting effect
function animateStatNumbers() {
    $('.stat-number').each(function() {
        const $this = $(this);
        const countTo = parseInt($this.attr('data-count'));
        
        $({ countNum: 0 }).animate({
            countNum: countTo
        }, {
            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum).toLocaleString());
            },
            complete: function() {
                $this.text(countTo.toLocaleString());
                
                // Add percentage sign for conversion rate
                if ($this.closest('.conversion').length) {
                    $this.append('<span>%</span>');
                }
            }
        });
    });
}

function updateStatCardData() {
    $('.stat-card').each(function () {
        const $this = $(this);
        const statNumber = $this.find('.stat-number');
        const dataCount = statNumber.data('count');

        // Check if this stat-number originally had a % inside it
        const hasPercent = statNumber.html().includes('%');

        // Set the number with commas, and optionally add the % symbol
        statNumber.text(dataCount.toLocaleString());

        if (hasPercent) {
            statNumber.append('<span>%</span>');
        }
    });
}


$(document).ready(function() {
    // Toggle sidebar on mobile
    $('#menuToggle').on('click', function() {
        $('.sidebar').toggleClass('open');
    });

    // Toggle dark mode
    $('#themeToggle').on('click', function() {
        $('body').toggleClass('dark-mode');
        
        if ($('body').hasClass('dark-mode')) {
            $(this).html('<i class="fas fa-sun"></i>');
            updateChartsForDarkMode(true);
        } else {
            $(this).html('<i class="fas fa-moon"></i>');
            updateChartsForDarkMode(false);
        }
    });

    // Animate stat numbers
    animateStatNumbers();

    // Initialize charts
    initCharts();

    // Add hover effects to cards
    $('.stat-card, .chart-card, .activity-item, .referrer-item').hover(
        function() {
            $(this).css('transform', 'translateY(-5px)');
        },
        function() {
            $(this).css('transform', 'translateY(0)');
        }
    );

    // Date picker functionality
    $('.date-btn').on('click', function() {
        $('.date-btn').removeClass('active');
        $(this).addClass('active');
    });

    // Chart action buttons
    $('.chart-action').on('click', function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
});



// Update charts for dark mode
function updateChartsForDarkMode(isDarkMode) {
    const textColor = isDarkMode ? '#FFFFFF' : '#1A1A1A';
    const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
    
    // Update visitor chart
    window.appCharts.visitorChart.options.scales.x.ticks.color = textColor;
    window.appCharts.visitorChart.options.scales.y.ticks.color = textColor;
    window.appCharts.visitorChart.options.scales.x.grid.color = gridColor;
    window.appCharts.visitorChart.options.scales.y.grid.color = gridColor;
    
    // Update conversion chart
    window.appCharts.conversionChart.options.scales.x.ticks.color = textColor;
    window.appCharts.conversionChart.options.scales.y.ticks.color = textColor;
    window.appCharts.conversionChart.options.scales.x.grid.color = gridColor;
    window.appCharts.conversionChart.options.scales.y.grid.color = gridColor;
    
    // Update all charts
    Object.values(window.appCharts).forEach(chart => chart.update());
}

function init_dashboard_js() {
    console.log('Dashboard JS loaded.');
    updateStatCardData();
    // Initialize charts
    initCharts();
}


// function init_subscribers_js() {
//     console.log('Subscribers JS loaded.');
//     // Fetch chart data, build tables, etc.
// }