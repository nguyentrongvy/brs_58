$(document).ready(function() {
    $('#datatable_ajax').DataTable( {
        "order": [[ 3, "desc" ]]
    });

    $('#delete_book').click(function() {
        $message = $('#delete_book').attr('data-confirm')
        if (window.confirm($message)) {
            return true;
        }

        return false;
    });
});

function confirm_delete(msg) {
    if (window.confirm(msg)) {
        return true;
    }

    return false;
}
