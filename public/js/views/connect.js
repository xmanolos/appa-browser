$('#btn-test-conn').on('click', function() {
    let successCallback = function(jsonReturn) {
        if(jsonReturn.status === 'success')
            successDialog(jsonReturn.msg);
        else
            errorDialog(jsonReturn.msg);
    };

    if (formIsValid()) {
        ajaxRequestToApi(
            'api.connection.test',
            $('#form').serialize(),
            successCallback
        );
    } else {
        $('form')[0].reportValidity()
    }
});

$('#form').submit( function(e) {
    let urlAction = $(this).attr('action');
    e.preventDefault();

    let successCallback = function(jsonReturn) {
        if(jsonReturn.status === 'success')
            window.location.href = urlAction;
        else
            errorDialog(jsonReturn.msg);
    };

    //TODO: Implement function ajaxRequestToApi without stop loading in success
    ajaxRequestToApi(
        'api.connection.connect',
        $('#form').serialize(),
        successCallback
    );
});

function formIsValid() {
    return $('form')[0].checkValidity();
}