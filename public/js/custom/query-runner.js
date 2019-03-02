class QueryRunner {
    constructor(query, containerId) {
        this.query = query;
        this.containerId = containerId;
    }

    run() {
        // TODO: Fix.
        $.ajax({
            type: 'POST',
            url: route('api.query.run'),
            data : { 'query': this.query },
            dataType: 'JSON',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            beforeSend: function() {
                startLoading();
            }
        }).done(function(queryRunResult) {
            stopLoading();

            this.queryRunResult = queryRunResult;
            this.showQueryResult();
        }.bind(this));
    }

    showQueryResult() {
        let queryState = this.queryRunResult.state;

        if (queryState == 'success') {
            this.showSuccessQueryResult();
        } else if (queryState == 'error') {
            this.showErrorQueryResult();
        } 

        // TODO: Unknown.
    }

    showSuccessQueryResult() {
        let queryType = this.queryRunResult.type;
        let queryMessage = this.queryRunResult.message;

        if (queryType == 'SELECT') {
            let queryData = this.queryRunResult.data;

            this.loadSelectResult(queryData);
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



