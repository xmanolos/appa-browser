class ConnectionInfo {
	show(container) {
		let errorCallback = function(response) {
			let dialog = new Dialog();
			dialog.useMessage(response.responseText);
			dialog.showError();
		};

		let successCallback = function(response) {
			let showDialog = function (containerElement) {
				let driverImage = Asset.getImageDriver(response.driver);

				$(".connection-driver", containerElement).attr("src", driverImage);
				$(".connection-hostname", containerElement).text(response.hostname);
				$(".connection-port", containerElement).text(response.port);
				$(".connection-username", containerElement).text(response.username);
				$(".connection-database", containerElement).text(response.database);

				let containerHtml = $(".panel-connection-info", containerElement).html();

				let dialog = new Dialog();
				dialog.useHtml(containerHtml);
				dialog.showInfo();
			};

			let containerElement = $("." + container);
			let labelConnectionElement = $("#label-connection", containerElement);

			$(labelConnectionElement).addClass("green");
			$(labelConnectionElement).html("Connected on <b>" + response.hostname + "</b>");

			$(labelConnectionElement).on("click", function() {
				showDialog(containerElement);
			});
		};

		let apiRequest = new ApiRequest(this);
		apiRequest.setSuccessCallback(successCallback);
		apiRequest.setErrorCallback(errorCallback);
		apiRequest.getToRoute("api.connection.info");
	}
}