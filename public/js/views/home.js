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

$('#btn-connect').on('click', function() {

    let successCallback = function(jsonReturn) {
        location.href = window.location.href = '/menu'; // TODO: Fix!
    };

    ajaxRequestToApi(
        'connect',
        $('#form').serialize(),
        successCallback
    );
});
