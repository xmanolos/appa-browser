class DatabaseData {
	constructor(schema) {
		this.schema = schema;
	}

	show(containerId) {
		this.treeView = new TreeView(containerId);
		this.treeView.init();

		this.load();
	}

	load() {
		this.treeView.clearNode("#");

		this.treeView.addNode({
			id: "node-tables",
			text: "Tables",
			icon: "la la-ellipsis-h"
		});

		this.treeView.addNode({
			id: "node-views",
			text: "Views",
			icon: "la la-ellipsis-h"
		});

		this.treeView.addNode({
			id: "node-routines",
			text: "Routines",
			icon: "la la-ellipsis-h"
		});

		this.treeView.addOnNodeSelectedAction("node-tables", this.onTablesOpen, this);
		this.treeView.addOnNodeSelectedAction("node-views", this.onViewsOpen, this);
		this.treeView.addOnNodeSelectedAction("node-routines", this.onRoutinesOpen, this);
	}

	onTablesOpen(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let tables = data.responseJSON;

			treeView.clearNode("node-tables");

			$.each(tables, function(index, table) {
				let nodeId = "node-table-" + index;
				let node = {
					id: nodeId,
					text: table.name,
					icon: "la la-th-large",
					value: table.name
				};

				treeView.addNode(node, "node-tables");
				treeView.addOnNodeSelectedAction(nodeId, bind.onTableSelected, bind);
			});

			treeView.openNode("node-tables");
		};

		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ "schema": bind.schema });
		apiRequest.setCompleteCallback(onCompleteCallback);
		apiRequest.getToRoute("api.database-data.tables.get");
	}

	onViewsOpen(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let views = data.responseJSON;

			treeView.clearNode("node-views");

			$.each(views, function(index, view) {
				let nodeId = "node-view-" + index;
				let node = {
					id: nodeId,
					text: view.name,
					icon: "la la-th-large",
					value: view.name
				};

				treeView.addNode(node, "node-views");
				treeView.addOnNodeSelectedAction(nodeId, bind.onViewSelected, bind);
			});

			treeView.openNode("node-views");
		};

		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ "schema": bind.schema });
		apiRequest.setCompleteCallback(onCompleteCallback);
		apiRequest.getToRoute("api.database-data.views.get");
	}

	onRoutinesOpen(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let routines = data.responseJSON;

			treeView.clearNode("node-routines");

			$.each(routines, function(index, routine) {
				let nodeId = "node-routine-" + index;
				let node = {
					id: nodeId,
					text: routine.name,
					icon: "la la-flash",
					value: routine.name
				};

				treeView.addNode(node, "node-routines");
			});

			treeView.openNode("node-routines");
		};

		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ "schema": bind.schema });
		apiRequest.setCompleteCallback(onCompleteCallback);
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

		treeView.openNode(event.nodeId);

		bind.treeView.addOnNodeSelectedAction(nodeColumnsId, bind.onViewColumnsOpen, bind);
	}

	onTableColumnsOpen(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let columns = data.responseJSON;

			bind.treeView.clearNode(event.nodeId);

			$.each(columns, function(index, column) {
				let nodeId = "node-column-" + index;
				let nodeText = column.name + " (" + column.dataType + ")";

				let node = {
					id: nodeId,
					text: nodeText,
					icon: "la la-columns",
					value: column.name
				};

				treeView.addNode(node, event.nodeId);
			});

			treeView.openNode(event.nodeId);
		};

		let table = bind.treeView.getNodeValue(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ "schema": bind.schema, "table": table });
		apiRequest.setCompleteCallback(onCompleteCallback);
		apiRequest.getToRoute("api.database-data.table.columns.get");
	}

	onTableConstraintsOpen(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let constraints = data.responseJSON;

			bind.treeView.clearNode(event.nodeId);

			$.each(constraints, function(index, constraint) {
				let nodeId = "node-constraint-" + index;
				let nodeText = constraint.name;

				let node = {
					id: nodeId,
					text: nodeText,
					icon: "la la-key",
					value: constraint.name
				};

				treeView.addNode(node, event.nodeId);
			});

			treeView.openNode(event.nodeId);
		};

		let table = bind.treeView.getNodeValue(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ "schema": bind.schema, "table": table });
		apiRequest.setCompleteCallback(onCompleteCallback);
		apiRequest.getToRoute("api.database-data.table.constraints.get");
	}

	onViewColumnsOpen(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let columns = data.responseJSON;

			bind.treeView.clearNode(event.nodeId);

			$.each(columns, function(index, column) {
				let nodeId = "node-column-" + index;
				let nodeText = column.name + " (" + column.dataType + ")";

				let node = {
					id: nodeId,
					text: nodeText,
					icon: "la la-columns",
					value: column.name
				};

				treeView.addNode(node, event.nodeId);
			});

			treeView.openNode(event.nodeId);
		};

		let view = bind.treeView.getNodeValue(event.nodeId);
		
		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ "schema": bind.schema, "view": view });
		apiRequest.setCompleteCallback(onCompleteCallback);
		apiRequest.getToRoute("api.database-data.view.columns.get");
	}
}