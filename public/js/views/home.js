$('#btn-test-conn').on('click', function() {

    let successCallback = function(jsonReturn) {
        if(jsonReturn.status === 'success')
            successDialog(jsonReturn.msg);
        else
            errorDialog(jsonReturn.msg);
    };

    ajaxRequestToApi(
        'test-connection',
        $('#form').serialize(),
        successCallback
    );
});

$("#form").submit( function(e) {
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
        'connect',
        $('#form').serialize(),
        successCallback
    );
});
