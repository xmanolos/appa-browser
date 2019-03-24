class QueryRunner {
    constructor(query, containerId) {
        this.query = query;
        this.containerId = containerId;
    }

    run(schemaName, schemaCharset) {
        let queryData = { 
            'schema-name': schemaName, 
            'schema-charset': schemaCharset,
            'query': this.query 
        };

        let completeCallback = function(runResult, bind) {
            console.log(runResult.responseJSON);
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
        let queryIsSuccess = bind.queryRunResult.isSuccess;
        let queryIsError = bind.queryRunResult.isError;

        if (queryIsSuccess) {
            bind.showSuccessQueryResult(bind);
        } else if (queryIsError) {
            bind.showErrorQueryResult(bind);
        }
    }

    showSuccessQueryResult(bind) {
        let queryType = bind.queryRunResult.queryType;
        let queryMessage = bind.queryRunResult.responseMessage;

        if (queryType == 'SELECT') {
            let queryData = bind.queryRunResult.responseData;

            bind.loadSelectResult(queryData);
        }

        successDialog(queryMessage);
    }

    showErrorQueryResult() {
        let queryMessage = this.queryRunResult.responseMessage;
        let queryException = this.queryRunResult.responseException;

        errorDialog(queryException, queryMessage, 700);
    }

    loadSelectResult(queryData) {
        let gridBuilder = new GridBuilder(this.containerId);
        gridBuilder.setData(queryData);
        gridBuilder.build();
    }
}