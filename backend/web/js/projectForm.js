$(document).ready(function() {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.btn-delete-image').on('click', function() {
        let $button = $(this); 
        $button.prop('disabled', true);

        let projectImageId = $button.data('projectImageId');

        $.post('delete-project-image', {id: projectImageId, _csrf: csrfToken})
            .done(function () {
                $('#project-form__image-container-' + projectImageId)?.remove();
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                $button.prop('disabled', false); 
                
                // Log the error details
                console.error('Request Failed:', textStatus, errorThrown);
                console.log('Response Details:', jqXHR.responseText);

                $('#project-form__image-error-message-' + projectImageId)?.text('Failed to delete!');
            });
    });
});
