class ConnectionInfo {
	show(containerId) {
		let errorCallback = function(data) {
			errorDialog('Failed to get your connection information.');
		};

		let completeCallback = function(data) {
			let response = data.responseJSON;

			if (response.STATUS === 'SUCCESS') {
				let connectionInfoValues = [
					'Host: ' + response.INFO.hostname,
					'Port:' + response.INFO.port,
					'Username: ' + response.INFO.username,
					'Database: ' + response.INFO.database
				];

				$('#' + containerId + ' #label-connection').attr('value', 'Connected on ' + response.INFO.hostname);
				$('#' + containerId + ' #label-connection').addClass('green');
				$('#' + containerId + ' #label-connection').on('click', function() {
					listInfoDialog(connectionInfoValues);listInfoDialog(connectionInfoValues);
				});
			} else {
				errorDialog('Failed to get your connection information.');		
			}
		};

		let apiRequest = new ApiRequest();
		apiRequest.setCompleteCallback(completeCallback);
		apiRequest.getToRoute('api.connection.info');
	}
}