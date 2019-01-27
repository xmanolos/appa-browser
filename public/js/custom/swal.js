function successDialog(successMessage = 'Yeah!') {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    toast({
        type: 'success',
        title: successMessage
    });
}

function errorDialog(errorMessage = 'Sorry, something went wrong!', errorTitle = 'Ops...') {
    swal({
        type: 'error',
        title: errorTitle,
        html: errorMessage,
        width: 500,
    });
}