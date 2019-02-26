function runQuery(query) {
	// TODO: Fix!

    $.ajax({
        type: 'POST',
        url: route('api.query.run'),
        data : { 'query': query },
        dataType: 'JSON',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        beforeSend: function() {
            startLoading();
        },
        error: function() {
            console.log('kkj2');
        }
    }).done(function(queryRunResult) {
    	stopLoading();

		let queryState = queryRunResult.state;

		if (queryState == 'success') {
			successDialog('Query executed successfully!');
		} 

		if (queryState == 'error') {
			let queryException = queryRunResult.exception;

			errorDialog(queryException, 'Failed to execute query!', 700);
		}
	});
}