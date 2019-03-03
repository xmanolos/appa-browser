class QueryRunner {
    constructor(query, containerId) {
        this.query = query;
        this.containerId = containerId;
    }

    run() {
        let queryData = { 'query': this.query };
        let completeCallback = function(runResult, bind) {
            bind.queryRunResult = runResult.responseJSON;
            bind.showQueryResult(bind);
        }

        let apiRequest = new ApiRequest(this);
        apiRequest.setData(queryData);
        apiRequest.setCompleteCallback(completeCallback);
        apiRequest.disableContentType();
        apiRequest.postToRoute('api.query.run');
    }

    showQueryResult(bind) {
        let queryState = bind.queryRunResult.state;
        
        if (queryState == 'success') {
            bind.showSuccessQueryResult(bind);
        } else if (queryState == 'error') {
            bind.showErrorQueryResult(bind);
        }
    }

    showSuccessQueryResult(bind) {
        let queryType = bind.queryRunResult.type;
        let queryMessage = bind.queryRunResult.message;

        if (queryType == 'SELECT') {
            let queryData = bind.queryRunResult.data;

            bind.loadSelectResult(queryData);
        }

        successDialog(queryMessage);
    }

    showErrorQueryResult() {
        let queryException = this.queryRunResult.exception;
        let queryMessage = this.queryRunResult.message;

        errorDialog(queryException, queryMessage, 700);
    }

    loadSelectResult(queryData) {
        let gridBuilder = new GridBuilder(this.containerId);
        gridBuilder.setData(queryData);
        gridBuilder.build();
    }
}



