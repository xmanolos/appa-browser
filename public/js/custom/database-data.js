class DatabaseData {
	show(containerId) {
		this.treeView = new TreeView(containerId);
		this.treeView.init();

		this.load();
	}

	load() {
		this.treeView.clearNode("#");

		this.treeView.addNode({
			id: "node-schemas",
			text: "Schemas",
			icon: "la la-ellipsis-h"
		});

		this.treeView.addOnNodeSelectedAction("node-schemas", this.onSchemasOpen, this);
	}

	onSchemasOpen(event, bind) {
		let errorCallback = function(response) {
			let dialog = new Dialog();
			dialog.useMessage(response.responseText);
			dialog.showError();
		};

		let successCallback = function(response, bind) {
			let treeView = bind.treeView;
			let schemas = response;

			treeView.clearNode("node-schemas");

			if (schemas && schemas.length) {
				$.each(schemas, function(index, schema) {
					let nodeId = "node-schema-" + index;
					let node = {
						id: nodeId,
						text: schema.name,
						icon: "la la-database",
						value: schema.name
					};

					treeView.addNode(node, "node-schemas");
					treeView.addOnNodeSelectedAction(nodeId, bind.onSchemaSelected, bind);
				});
			} else {
				treeView.addNodeNoData(event.nodeId);
			}

			treeView.stopLoadingNode(event.nodeId);
			treeView.openNode("node-schemas");
		};

		let apiRequest = new ApiRequest(bind);
		apiRequest.disableLoading();
		apiRequest.setErrorCallback(errorCallback);
		apiRequest.setSuccessCallback(successCallback);
		apiRequest.getToRoute("api.database-data.schemas.get");
	}

	onSchemaSelected(event, bind) {
		let treeView = bind.treeView;
		let schema = bind.treeView.getNodeValue(event.nodeId);

		bind.treeView.clearNode(event.nodeId);

		let nodeTablesId = event.nodeId + "-tables";
		let nodeViewsId = event.nodeId + "-views";
		let nodeRoutinesId = event.nodeId + "-routines";

		bind.treeView.addNode({
			id: nodeTablesId,
			text: "Tables",
			icon: "la la-ellipsis-h",
			value: schema
		}, event.nodeId);

		bind.treeView.addNode({
			id: nodeViewsId,
			text: "Views",
			icon: "la la-ellipsis-h",
			value: schema
		}, event.nodeId);

		bind.treeView.addNode({
			id: nodeRoutinesId,
			text: "Routines",
			icon: "la la-ellipsis-h",
			value: schema
		}, event.nodeId);

		treeView.stopLoadingNode(event.nodeId);
		treeView.openNode(event.nodeId);

		bind.treeView.addOnNodeSelectedAction(nodeTablesId, bind.onTablesOpen, bind);
		bind.treeView.addOnNodeSelectedAction(nodeViewsId, bind.onViewsOpen, bind);
		bind.treeView.addOnNodeSelectedAction(nodeRoutinesId, bind.onRoutinesOpen, bind);
	}

	onTablesOpen(event, bind) {
		let errorCallback = function(response) {
			let dialog = new Dialog();
			dialog.useMessage(response.responseText);
			dialog.showError();
		};

		let successCallback = function(response, bind) {
			let treeView = bind.treeView;
			let tables = response;

			treeView.clearNode(event.nodeId);

			if (tables && tables.length) {
				let nodeTableId = event.nodeId + "-table-";

				$.each(tables, function(index, table) {
					let nodeId = nodeTableId + index;
					let node = {
						id: nodeId,
						text: table.name,
						icon: "la la-th-large",
						value: table.name
					};

					treeView.addNode(node, event.nodeId);
					treeView.addOnNodeSelectedAction(nodeId, bind.onTableSelected, bind);
				});
			} else {
				treeView.addNodeNoData(event.nodeId);
			}

			treeView.stopLoadingNode(event.nodeId);
			treeView.openNode(event.nodeId);
		};

		let schema = bind.treeView.getNodeValue(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.disableLoading();
		apiRequest.setData({ "schema": schema });
		apiRequest.setErrorCallback(errorCallback);
		apiRequest.setSuccessCallback(successCallback);
		apiRequest.getToRoute("api.database-data.tables.get");
	}

	onViewsOpen(event, bind) {
		let errorCallback = function(response) {
			let dialog = new Dialog();
			dialog.useMessage(response.responseText);
			dialog.showError();
		};

		let successCallback = function(response, bind) {
			let treeView = bind.treeView;
			let views = response;

			treeView.clearNode(event.nodeId);

			if (views && views.length) {
				let nodeViewId = event.nodeId + "-view-";

				$.each(views, function(index, view) {
					let nodeId = nodeViewId + index;
					let node = {
						id: nodeId,
						text: view.name,
						icon: "la la-th-large",
						value: view.name
					};

					treeView.addNode(node, event.nodeId);
					treeView.addOnNodeSelectedAction(nodeId, bind.onViewSelected, bind);
				});
			} else {
				treeView.addNodeNoData(event.nodeId);
			}

			treeView.stopLoadingNode(event.nodeId);
			treeView.openNode(event.nodeId);
		};

		let schema = bind.treeView.getNodeValue(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.disableLoading();
		apiRequest.setData({ "schema": schema });
		apiRequest.setErrorCallback(errorCallback);
		apiRequest.setSuccessCallback(successCallback);
		apiRequest.getToRoute("api.database-data.views.get");
	}

	onRoutinesOpen(event, bind) {
		let errorCallback = function(response) {
			let dialog = new Dialog();
			dialog.useMessage(response.responseText);
			dialog.showError();
		};

		let successCallback = function(response, bind) {
			let treeView = bind.treeView;
			let routines = response;

			treeView.clearNode(event.nodeId);

			if (routines || routines.length) {
				let nodeRoutineId = event.nodeId + "-routine-";

				$.each(routines, function(index, routine) {
					let nodeId = nodeRoutineId + index;
					let node = {
						id: nodeId,
						text: routine.name,
						icon: "la la-flash",
						value: routine.name
					};

					treeView.addNode(node, event.nodeId);
				});
			} else {
				treeView.addNodeNoData(event.nodeId);
			}

			treeView.stopLoadingNode(event.nodeId);
			treeView.openNode(event.nodeId);
		};

		let schema = bind.treeView.getNodeValue(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.disableLoading();
		apiRequest.setData({ "schema": schema });
		apiRequest.setErrorCallback(errorCallback);
		apiRequest.setSuccessCallback(successCallback);
		apiRequest.getToRoute("api.database-data.routines.get");
	}

	onTableSelected(event, bind) {
		let treeView = bind.treeView;
		let table = bind.treeView.getNodeValue(event.nodeId);

		bind.treeView.clearNode(event.nodeId);

		let nodeColumnsId = event.nodeId + "-columns";
		let nodeConstraintsId = event.nodeId + "-constraints";

		bind.treeView.addNode({
			id: nodeColumnsId,
			text: "Columns",
			icon: "la la-ellipsis-h",
			value: table
		}, event.nodeId);

		bind.treeView.addNode({
			id: nodeConstraintsId,
			text: "Constraints",
			icon: "la la-ellipsis-h",
			value: table
		}, event.nodeId);

		treeView.stopLoadingNode(event.nodeId);
		treeView.openNode(event.nodeId);

		bind.treeView.addOnNodeSelectedAction(nodeColumnsId, bind.onTableColumnsOpen, bind);
		bind.treeView.addOnNodeSelectedAction(nodeConstraintsId, bind.onTableConstraintsOpen, bind);
	}

	onViewSelected(event, bind) {
		let treeView = bind.treeView;
		let view = bind.treeView.getNodeValue(event.nodeId);

		bind.treeView.clearNode(event.nodeId);

		let nodeColumnsId = event.nodeId + "-columns";

		bind.treeView.addNode({
			id: nodeColumnsId,
			text: "Columns",
			icon: "la la-ellipsis-h",
			value: view
		}, event.nodeId);

		treeView.stopLoadingNode(event.nodeId);
		treeView.openNode(event.nodeId);

		bind.treeView.addOnNodeSelectedAction(nodeColumnsId, bind.onViewColumnsOpen, bind);
	}

	onTableColumnsOpen(event, bind) {
		let errorCallback = function(response) {
			let dialog = new Dialog();
			dialog.useMessage(response.responseText);
			dialog.showError();
		};

		let successCallback = function(response, bind) {
			let treeView = bind.treeView;
			let columns = response;

			bind.treeView.clearNode(event.nodeId);

			if (columns && columns.length) {
				let nodeColumnId = event.nodeId + "-column-";

				$.each(columns, function(index, column) {
					let nodeId = nodeColumnId + index;
					let nodeText = column.name + " (" + column.dataType + ")";

					let node = {
						id: nodeId,
						text: nodeText,
						icon: "la la-columns",
						value: column.name
					};

					treeView.addNode(node, event.nodeId);
				});
			} else {
				treeView.addNodeNoData(event.nodeId);
			}

			treeView.stopLoadingNode(event.nodeId);
			treeView.openNode(event.nodeId);
		};

		let table = bind.treeView.getNodeValue(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.disableLoading();
		apiRequest.setData({ "schema": bind.schema, "table": table });
		apiRequest.setErrorCallback(errorCallback);
		apiRequest.setSuccessCallback(successCallback);
		apiRequest.getToRoute("api.database-data.table.columns.get");
	}

	onTableConstraintsOpen(event, bind) {
		let errorCallback = function(response) {
			let dialog = new Dialog();
			dialog.useMessage(response.responseText);
			dialog.showError();
		};

		let successCallback = function(response, bind) {
			let treeView = bind.treeView;
			let constraints = response;

			bind.treeView.clearNode(event.nodeId);

			if (constraints && constraints.length) {
				let nodeConstraintId = event.nodeId + "-constraint-";

				$.each(constraints, function(index, constraint) {
					let nodeId = nodeConstraintId + index;
					let nodeText = constraint.name;

					let node = {
						id: nodeId,
						text: nodeText,
						icon: "la la-key",
						value: constraint.name
					};

					treeView.addNode(node, event.nodeId);
				});
			} else {
				treeView.addNodeNoData(event.nodeId);
			}

			treeView.stopLoadingNode(event.nodeId);
			treeView.openNode(event.nodeId);
		};

		let table = bind.treeView.getNodeValue(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.disableLoading();
		apiRequest.setData({ "schema": bind.schema, "table": table });
		apiRequest.setErrorCallback(errorCallback);
		apiRequest.setSuccessCallback(successCallback);
		apiRequest.getToRoute("api.database-data.table.constraints.get");
	}

	onViewColumnsOpen(event, bind) {
		let errorCallback = function(response) {
			let dialog = new Dialog();
			dialog.useMessage(response.responseText);
			dialog.showError();
		};

		let successCallback = function(response, bind) {
			let treeView = bind.treeView;
			let columns = response;

			bind.treeView.clearNode(event.nodeId);

			if (columns && columns.length) {
				let nodeColumnId = event.nodeId + "-column-";

				$.each(columns, function(index, column) {
					let nodeId = nodeColumnId + index;
					let nodeText = column.name + " (" + column.dataType + ")";

					let node = {
						id: nodeId,
						text: nodeText,
						icon: "la la-columns",
						value: column.name
					};

					treeView.addNode(node, event.nodeId);
				});
			} else {
				treeView.addNodeNoData(event.nodeId);
			}

			treeView.stopLoadingNode(event.nodeId);
			treeView.openNode(event.nodeId);
		};

		let view = bind.treeView.getNodeValue(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.disableLoading();
		apiRequest.setData({ "schema": bind.schema, "view": view });
		apiRequest.setErrorCallback(errorCallback);
		apiRequest.setSuccessCallback(successCallback);
		apiRequest.getToRoute("api.database-data.view.columns.get");
	}
}