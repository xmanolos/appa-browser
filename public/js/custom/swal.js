function successDialog(successMessage = 'Yeah!') {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    
    toast.fire({
        type: 'success',
        title: successMessage
    });
}

function errorDialog(errorMessage = 'Sorry, something went wrong!', errorTitle = 'Ops...', windowSize = 500) {
    swal.fire({
        type: 'error',
        title: errorTitle,
        html: errorMessage,
        width: windowSize,
    });
}

function infoDialog(html) {
    swal.fire({
        html: html,
        showCloseButton: true,
        focusConfirm: false,
    });
}

function listInfoDialog(values) {
    let html = '<div>';

    $.each(values, function(index, value) {
        html += '<span>' + value + '</span><br>';
    });

    html += '</div>';

    infoDialog(html);
}