$('#btn-test-conn').on('click', function() {
    let beforeSendCallback = function() {
        $('#btn-test-conn').prop('disabled', true);
        $('#btn-connect').prop('disabled', true);
    }

    let successCallback = function(jsonReturn) {
        if(jsonReturn.status === 'success')
            successDialog(jsonReturn.msg);
        else
            errorDialog(jsonReturn.msg);
    };

    let completeCallback = function() {
        $('#btn-test-conn').prop('disabled', false);
        $('#btn-connect').prop('disabled', false);
    }

    ajaxRequestToApi(
        'test-connection',
        $('#form').serialize(),
        successCallback,
        beforeSendCallback,
        completeCallback
    );
});

$('#btn-connect').on('click', function() {
    let beforeSendCallback = function() {
        $('#btn-test-conn').prop('disabled', true);
        $('#btn-connect').prop('disabled', true);
    }

    let successCallback = function(jsonReturn) {
        location.href = window.location.href = '/menu'; // TODO: Fix!
    };

    let completeCallback = function() {
        $('#btn-test-conn').prop('disabled', false);
        $('#btn-connect').prop('disabled', false);
    }

    ajaxRequestToApi(
        'connect',
        $('#form').serialize(),
        successCallback,
        beforeSendCallback,
        completeCallback
    );
});