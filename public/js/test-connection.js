$("#btn-test-conn").on('click', function() {
    let beforeSendCallback = function() {
        $("#btn-test-conn").prop('disabled', true);
        $("#btn-sub-form").prop('disabled', true);
    }

    let successCallback = function(jsonReturn) {
        if(jsonReturn.status === "success")
            successDialog(jsonReturn.msg);
        else
            errorDialog(jsonReturn.msg);
    };

    let completeCallback = function() {
        $("#btn-test-conn").prop('disabled', false);
        $("#btn-sub-form").prop('disabled', false);
    }

    ajaxRequestToApi(
        'test-connection',
        $("#form").serialize(),
        successCallback,
        beforeSendCallback,
        completeCallback
    );
});

//TODO: only tests;
function setDataForm(){
    $("select[name='driver']").val('mysql');
    $("input[name='database']").val('dbbrowser2');
    $("input[name='hostname']").val('db4free.net');
    $("input[name='port']").val('3306');
    $("input[name='username']").val('rootdb8');
    $("input[name='password']").val('12345678');
}
