class ConnectionInfo {
	show(containerId) {
		let errorCallback = function(data) {
			errorDialog('Failed to get your connection information.');
		};

		let completeCallback = function(data) {
			let response = data.responseJSON;

			if (response.STATUS === 'SUCCESS') {
				// Driver Icon: new DriverIcon().getUrl(response.INFO.driver);
				// Host: response.INFO.hostname
				// Port: response.INFO.port
				// Username: response.INFO.username
				// Database: response.INFO.database

				// TODO: Issue #21.
			} else {
				errorDialog('Failed to get your connection information.');		
			}
		};

		let apiRequest = new ApiRequest();
		apiRequest.setCompleteCallback(completeCallback);
		apiRequest.getToRoute('api.connection.info');
	}
}