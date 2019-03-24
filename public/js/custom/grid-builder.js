class GridBuilder {

    constructor(panelInsert) {
        this.panelInsert = panelInsert;
    }

    //Example: [{ name: "Name", type: "text", width: 150, validate: "required", title: "Nombre" }]
    setFields(dbFields){
        this.dbFields = dbFields;
    }

    //Example: [{"name_filed": "value"}]
    setData(dbData){
        this.dbData = dbData;

        let dbDataFirst = this.dbData[0];
        let buildFields =[];
        $.each(dbDataFirst, function(key, value){
            let column = {
                name: key,
                type: "text"
            };
            buildFields.push(column);
        });
        this.setFields(buildFields);
    }

    build(){
        $("#"+this.panelInsert).append('<div id="grid-builder" style="display: block;"></div>')
        $("#grid-builder").jsGrid({
            height: "100%",
            width: "100%",
            heading: true,
            paging: true,
            sorting: true,
            filtering: true,
            autoload: true,
            pageSize: 15,
            data: this.dbData,
            fields: this.dbFields
        });
    }
}
