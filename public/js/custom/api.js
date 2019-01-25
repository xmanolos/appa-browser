function getApiRoute(target) {
    var apiUrl = location.origin + '/api/';
    var apiRoute = apiUrl + target;

    return apiRoute;
}

function ajaxRequestToApi(apiTarget, dataSend, successCallback, customBeforeSendCallback, customCompleteCallback){
    $.ajax({
        url: getApiRoute(apiTarget),
        contentType: 'application/json',
        data : dataSend,
        beforeSend: function() {
            console.log('start loading');
            //TODO: Start loading
            if(customBeforeSendCallback)
                customBeforeSendCallback();
        },
        success : successCallback,
        error: function(errorObj, textStatus, errorThrown) {
            let statusCode = errorObj.status
            let message = textStatus + ' ' + statusCode + ' - ' + errorThrown;
            errorDialog( message );
            console.log(jqXHR);
        },
        complete: function() {
            console.log('request end');
            if(customCompleteCallback)
                customCompleteCallback();
        }
    });
}
