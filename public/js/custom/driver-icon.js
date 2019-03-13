class DriverIcon {
	getUrl(driver) {
		let basePath = window.location.origin + '/images/drivers/';

		return basePath + driver + '.png';
	}
}