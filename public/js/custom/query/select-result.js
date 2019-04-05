class SelectResult {
    setContainer(container) {
        this.container = container;
    }

    setData(data) {
        this.data = data;
    }

    showGrid() {
        let columns = this.getDataColumns();
        let rows = this.getDataRows();

        let gridBuilder = new GridBuilder(this.container);
        gridBuilder.setColumns(columns);
        gridBuilder.setRows(rows);

        if (this.hasData()) {
            gridBuilder.build();
        } else {
            gridBuilder.clear();
        }
    }

    hasData() {
        return (this.data) && (this.data !== []) && (this.data.length > 0);
    }

    getDataColumns() {
        if (!this.hasData()) {
            return [];
        }

        let columns = [];
        let firstRow = this.data[0];

        $.each(firstRow, function(key) {
            let column = {
                name: key,
                type: "text"
            };

            columns.push(column);
        });

        return columns;
    }

    getDataRows() {
        return this.data;
    }
}