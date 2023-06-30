jQuery(document).ready(function($) {
    $('#contact-form').submit(function(e) {
        e.preventDefault();

        // Clear previous response message
        $('#response-message').html('');

        // Serialize form data
        var formData = $(this).serialize();

        // Add loading class to form
        $(this).addClass('loading');

        // AJAX request
        $.ajax({
            type: 'POST',
            url: contact_form_params.ajax_url,
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Display success message
                $('#response-message').html('<p class="text-success">' + response.data + '</p>');
            },
            error: function(xhr, status, error) {
                // Display error message
                $('#response-message').html('<p class="text-danger">' + xhr.responseText + '</p>');
            },
            complete: function() {
                // Remove loading class from form
                $('#contact-form').removeClass('loading');
                $('#contact-form')[0].reset();
            }
        });
    });
});
