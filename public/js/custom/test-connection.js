class TestConnection {
    constructor(connectionData) {
        this.connectionData = connectionData;
    }

    now() {
        let apiRequest = new ApiRequest();
        apiRequest.setData(this.connectionData);
        apiRequest.setCompleteCallback(this.showResult);
        apiRequest.getToRoute('api.connection.connect');
    }

    showResult(testResult) {
        let testResultJson = testResult.responseJSON;
        let resultIsOK = testResultJson.STATUS === 'SUCCESS';
        let resultMessage = testResultJson.MESSAGE;
        
        if (resultIsOK) {
            let dialog = new Dialog();
            dialog.useTitle(resultMessage);
            dialog.showSuccess();
        } else {
            let dialog = new Dialog();
            dialog.useMessage(resultMessage);
            dialog.showError();
        }
    }
}