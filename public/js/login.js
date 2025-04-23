$(document).ready(function () {
    $('#login-btn').closest('form').on('submit', function (e) {
        e.preventDefault();

        const $form = $(this);
        const $btn = $('#login-btn');
        const $text = $btn.find('.btn-text');
        const $spinner = $btn.find('.btn-spinner');

        $btn.attr('disabled', true);
        $text.text('Logging in...');
        $spinner.show();

        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function (response) {
                // $('.pg-form-actions').append(`<div class="alert alert-success">Login successful!</div>`);
                showCustomToast('success', 'Success!', 'Login successful!');
                window.location.href = response.redirect_url || '/dashboard';
            },
            error: function (xhr) {
                let msg = xhr.responseJSON?.message || 'Login failed.';
                // $('.pg-form-actions').append(`<div class="alert alert-danger">${msg}</div>`);
                showCustomToast('error', 'Error!', msg);
                $btn.attr('disabled', false);
                $text.text('Login');
                $spinner.hide();
            }
        });
    });
});