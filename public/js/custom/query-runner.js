class QueryRunner {
    setContainer(container) {
        this.container = container;
    }

    setQuery(query) {
        this.query = query;
    }

    run(schemaName, schemaCharset) {
        let queryData = { "schema-name": schemaName,
            "schema-charset": schemaCharset,
            "query": this.query
        };

        let selectResult = new SelectResult();
        selectResult.setContainer(this.container);

        let errorCallback = function(response) {
            let dialog = new Dialog();
            dialog.useMessage(response.responseText);
            dialog.showError();

            selectResult.setData(null);
            selectResult.showGrid();
        };

        let successCallback = function(response) {
            let dialog = new Dialog();
            dialog.useTitle(response.message);
            dialog.showSuccess();

            selectResult.setData(response.data);
            selectResult.showGrid();
        };

        let apiRequest = new ApiRequest(this);
        apiRequest.setData(queryData);
        apiRequest.disableContentType();
        apiRequest.setErrorCallback(errorCallback);
        apiRequest.setSuccessCallback(successCallback);
        apiRequest.postToRoute("api.query.run");
    }
}