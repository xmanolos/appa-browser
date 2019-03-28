class ConnectionInfo {
	show(container) {
		let errorCallback = function(data) {
			let dialog = new Dialog();
			dialog.useMessage('Failed to get your connection information.');
			dialog.showError();
		};

		let completeCallback = function(data, bind) {
			let connectionInfo = data.responseJSON;

			if (connectionInfo.STATUS === 'SUCCESS') {
				let showDialog = function (containerElement) {
					let driverImagem = Asset.getImageDriver(connectionInfo.INFO.driver);

					$('.connection-driver', containerElement).attr('src', driverImagem);
					$('.connection-hostname', containerElement).text(connectionInfo.INFO.hostname);
					$('.connection-port', containerElement).text(connectionInfo.INFO.port);
					$('.connection-username', containerElement).text(connectionInfo.INFO.username);
					$('.connection-database', containerElement).text(connectionInfo.INFO.database);

					let containerHtml = $('.panel-connection-info', containerElement).html();

					let dialog = new Dialog();
					dialog.useHtml(containerHtml);
					dialog.showInfo();
				};

				let containerElement = $('.' + container);
				let labelConnectionElement = $('#label-connection', containerElement);

				$(labelConnectionElement).addClass('green');
				$(labelConnectionElement).html('Connected on <b>' + connectionInfo.INFO.hostname + '</b>');
				
				$(labelConnectionElement).on('click', function() {
					showDialog(containerElement);
				});
			} else {
				let dialog = new Dialog();
				dialog.useMessage('Failed to get your connection information.');
				dialog.showError();
			}
		};

		let apiRequest = new ApiRequest(this);
		apiRequest.setCompleteCallback(completeCallback);
		apiRequest.getToRoute('api.connection.info');
	}
}