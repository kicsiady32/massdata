function getOption(){
    selectElement = document.querySelector('#import');
    value = selectElement.value;
    if(value === "csv"){
        document.querySelector('#outputOne').textContent = 'Required Heaters:Order Date,Channel,SKU,Item Description,SO#,Total Price,Cost,Shipping Cost,Profit';
    }   
}