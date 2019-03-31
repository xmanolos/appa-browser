class Connect {
    constructor(connectionData) {
        this.connectionData = connectionData;
    }

    now() {
        let successCallback = function() {
            window.location.href = route('home');
        };

        let errorCallback = function(response) {
            let dialog = new Dialog();
            dialog.useMessage(response.responseText);
            dialog.showError();
        };

        let apiRequest = new ApiRequest();
        apiRequest.setData(this.connectionData);
        apiRequest.setSuccessCallback(successCallback);
        apiRequest.setErrorCallback(errorCallback);
        apiRequest.getToRoute('api.connection.connect');
    }
}