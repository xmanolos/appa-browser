class TestConnection {
    constructor(connectionData) {
        this.connectionData = connectionData;
    }

    now() {
        let successCallback = function() {
            let dialog = new Dialog();
            dialog.useTitle('Connection established successfully!'); // TODO: Receive on response.
            dialog.showSuccess();
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
        apiRequest.getToRoute('api.connection.test');
    }
}