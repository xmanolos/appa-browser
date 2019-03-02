function ajaxRequestToApi(apiTarget, dataSend, successCallback, customBeforeSendCallback, customCompleteCallback, requestType = 'GET', bind) {
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
        }.bind(bind),
        success : function(resultData) {
            stopLoading();
            
            setTimeout(
                function(){
                    if(successCallback)
                        successCallback(bind, resultData);
                },
                500
            );
        }.bind(bind),
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
        }.bind(bind),
        complete: function(resultData) {
            if(customCompleteCallback)
                customCompleteCallback(bind, resultData.responseJSON);
        }.bind(bind)
    });
}
