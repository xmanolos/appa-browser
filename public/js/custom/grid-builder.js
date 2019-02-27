class GridBuilder {
    let panelInsert;
    let dbData;
    let dbFields;

    constructor(panelInsert) {
        this.panelInsert = panelInsert;
    }

    //Example: [{ name: "Name", type: "text", width: 150, validate: "required", title: "Nombre" }]
    function setFields(dbFields){
        this.dbFields = dbFields;
    }

    //Example: [{"name_filed": "value"}]
    function setData(dbData){
        this.dbData = dbData;
    }

    function build(){
        $("#"+this.panelInsert).jsGrid({
            width: "100%",
            height: "100%",

            sorting: true,
            paging: true,

            data: this.dbData,

            fields: this.dbFields
        });
    }
}
