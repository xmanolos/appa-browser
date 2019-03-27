class Connect {
    constructor(connectionData) {
        this.connectionData = connectionData;
    }

    now() {
        let apiRequest = new ApiRequest();
        apiRequest.setData(this.connectionData);
        apiRequest.setCompleteCallback(this.showResult);
        apiRequest.getToRoute('api.connection.connect');
    }

    showResult(connectResult) {
        let connectResultJson = connectResult.responseJSON;
        let resultIsOK = connectResultJson.STATUS === 'SUCCESS';
        let resultMessage = connectResultJson.MESSAGE;

        if (resultIsOK) {
            window.location.href = route('home');
        } else {
            let dialog = new Dialog();
            dialog.useMessage(resultMessage);
            dialog.showError();
        }
    }
}