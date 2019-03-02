class Connect {
    constructor(connectionData) {
        this.connectionData = connectionData;
    }

    now() {
        ajaxRequestToApi('api.connection.test', this.connectionData, null, null, this.showResult, 'GET', this);
    }

    showResult(bind, testResult) {
        let resultIsOK = testResult.STATUS === 'SUCCESS';
        let resultMessage = testResult.MESSAGE;

        if (resultIsOK) {
            window.location.href = route('home');
        } else {
            errorDialog(resultMessage);
        }
    }
}