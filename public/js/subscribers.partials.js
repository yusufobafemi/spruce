$(document).ready(function() {
    // Animate stat numbers
    animateStatNumbers();
    
    // Toggle export modal
    $('#export-subscribers').on('click', function() {
        $('#export-modal').addClass('active');
    });
    
    $('.close-modal, .cancel-export').on('click', function() {
        $('#export-modal').removeClass('active');
    });
    
    // Select all checkboxes
    $('#select-all').on('change', function() {
        $('.subscriber-checkbox').prop('checked', $(this).prop('checked'));
    });
    
    // Check if all checkboxes are selected
    $('.subscriber-checkbox').on('change', function() {
        if ($('.subscriber-checkbox:checked').length === $('.subscriber-checkbox').length) {
            $('#select-all').prop('checked', true);
        } else {
            $('#select-all').prop('checked', false);
        }
    });
    
    // Search functionality
    $('#subscriber-search').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        
        $('.subscriber-row').each(function() {
            const email = $(this).find('td:nth-child(2)').text().toLowerCase();
            const name = $(this).find('td:nth-child(3)').text().toLowerCase();
            
            if (email.includes(searchTerm) || name.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    
    // Export functionality
    $('.confirm-export').on('click', function() {
        const format = $('input[name="export-format"]:checked').val();
        const range = $('input[name="export-range"]:checked').val();
        
        // Get selected fields
        const fields = [];
        $('.export-fields input:checked').each(function() {
            fields.push($(this).parent().text().trim());
        });
        
        // Simulate export process
        $(this).html('<i class="fas fa-spinner fa-spin"></i> Exporting...');
        
        setTimeout(function() {
            // Create CSV data
            let csvContent = "data:text/csv;charset=utf-8,";
            
            // Add headers
            csvContent += fields.join(",") + "\r\n";
            
            // Add data rows (simplified example)
            $('.subscriber-row').each(function() {
                const email = $(this).find('td:nth-child(2)').text();
                const name = $(this).find('td:nth-child(3)').text();
                const date = $(this).find('td:nth-child(4)').text();
                const status = $(this).find('.status-badge').text();
                const source = $(this).find('td:nth-child(6)').text();
                
                const row = [email, name, date, status, source].join(",");
                csvContent += row + "\r\n";
            });
            
            // Create download link
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "subscribers_export.csv");
            document.body.appendChild(link);
            
            // Trigger download
            link.click();
            
            // Reset button
            $('.confirm-export').html('Export <i class="fas fa-download"></i>');
            
            // Close modal
            $('#export-modal').removeClass('active');
            
            // Show success message
            alert("Export completed successfully!");
        }, 1500);
    });
    
    // Row hover animations
    $('.subscriber-row').hover(
        function() {
            $(this).css('transform', 'translateX(5px)');
        },
        function() {
            $(this).css('transform', 'translateX(0)');
        }
    );
});

// Animate stat numbers with counting effect
function animateStatNumbers() {
    $('.stat-value[data-count]').each(function() {
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
            }
        });
    });
}

function init_subscribers_js() {
    console.log('Subscribers JS loaded.');
    animateStatNumbers();
}