function getConnectionData() {
    let successCallback = function(jsonReturn) {
        console.log(jsonReturn);
    };

    ajaxRequestToApi('api.database-data.get', null, successCallback);
}

$(document).ready(function() {
    let connectionData = getConnectionData();

    console.log('--CONNECTION DATA');
    console.log(connectionData);
});