class Asset {
	static getImage(image) {
		return 'images/' + image;
	}

	static getImageDriver(driver) {
		return this.getImage('drivers/' + driver + '.svg');
	}
}