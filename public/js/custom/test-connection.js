class TestConnection {
    constructor(connectionData) {
        this.connectionData = connectionData;
    }

    now() {
        ajaxRequestToApi('api.connection.connect', this.connectionData, null, null, this.showResult, 'GET', this);
    }

    showResult(bind, testResult) {
        let resultIsOK = testResult.STATUS === 'SUCCESS';
        let resultMessage = testResult.MESSAGE;
        console.log(testResult);
        if (resultIsOK) {
            successDialog(resultMessage);
        } else {
            errorDialog(resultMessage);
        }
    }
}