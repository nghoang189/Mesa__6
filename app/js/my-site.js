$(document).on('click', '.delete-phieu', function() {
    var idPhieu = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '?route=delete-ajax',
        data: { id: idPhieu },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.success) {
                // Do something on success
                $('#phieu-container div#' + idPhieu).remove();
            } else {
                // Do something on failure
                alert("Xoa khong thanh cong!");
            }
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
});