function ajaxRequestToApi(apiTarget, dataSend, successCallback, customBeforeSendCallback, customCompleteCallback, requestType = 'GET') {
    let url = "";
    
    try {
        url = route(apiTarget);
    } catch(err) {
        url = apiTarget;
    }

    $.ajax({
        type: requestType,
        url: url,
        contentType: 'application/json',
        data : dataSend,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            startLoading();

            if(customBeforeSendCallback)
                customBeforeSendCallback();
        },
        success : function(resultData) {
            stopLoading();
            
            setTimeout(
                function(){
                    if(successCallback)
                        successCallback(resultData);
                },
                500
            );
        },
        error: function(errorObj, textStatus, errorThrown) {
            stopLoading();
            
            setTimeout(
                function(){
                    let statusCode = errorObj.status
                    let message = textStatus + ' ' + statusCode + ' - ' + errorThrown;
                    errorDialog( message );
                },
                500
            );
        },
        complete: function(resultData) {
            if(customCompleteCallback)
                customCompleteCallback(resultData);
        }
    });
}
