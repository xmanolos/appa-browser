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
		this.treeView.clearNode('#');

		this.treeView.addNode({
			id: 'node-tables',
			text: 'Tables',
			icon: 'la la-ellipsis-h'
		});

		this.treeView.addNode({
			id: 'node-views',
			text: 'Views',
			icon: 'la la-ellipsis-h'
		});

		this.treeView.addOnNodeSelectedAction('node-tables', this.onTablesOpen, this);
		this.treeView.addOnNodeSelectedAction('node-views', this.onViewsOpen, this);
	}

	onTablesOpen(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let tables = data.responseJSON;

			treeView.clearNode('node-tables');

			$.each(tables, function(index, table) {
				let nodeId = 'node-table-' + index;
				let node = {
					id: nodeId,
					text: table.tablename,
					icon: 'la la-table'
				};

				treeView.addNode(node, 'node-tables');
				treeView.addOnNodeSelectedAction(nodeId, bind.onTableOrViewSelected, bind);
			});

			treeView.openNode('node-tables');
		}

		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ schema: bind.schema });
		apiRequest.setCompleteCallback(onCompleteCallback);
		apiRequest.getToRoute('api.database-data.tables.get');
	}

	onViewsOpen(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let views = data.responseJSON;

			treeView.clearNode('node-views');

			$.each(views, function(index, view) {
				let nodeId = 'node-view-' + index;
				let node = {
					id: nodeId,
					text: view.viewname,
					icon: 'la la-table'
				};

				treeView.addNode(node, 'node-views');
				treeView.addOnNodeSelectedAction(nodeId, bind.onTableOrViewSelected, bind);
			});

			treeView.openNode('node-views');
		}

		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ schema: bind.schema });
		apiRequest.setCompleteCallback(onCompleteCallback);
		apiRequest.getToRoute('api.database-data.views.get');
	}

	onTableOrViewSelected(event, bind) {
		let onCompleteCallback = function(data, bind) {
			let treeView = bind.treeView;
			let columns = data.responseJSON;

			treeView.clearNode(event.nodeId);

			$.each(columns, function(index, column) {
				let nodeId = 'node-column-' + index;
				let nodeText = column.name + ' (' + column.dataType + ')';

				let node = {
					id: nodeId,
					text: nodeText,
					icon: 'la la-columns'
				};

				treeView.addNode(node, event.nodeId);
			});

			treeView.openNode(event.nodeId);
		}

		let tableOrView = bind.treeView.getNodeText(event.nodeId);

		let apiRequest = new ApiRequest(bind);
		apiRequest.setData({ tableOrView: tableOrView });
		apiRequest.setCompleteCallback(onCompleteCallback);
		apiRequest.getToRoute('api.database-data.columns.get');
	}
}