function fillTable(){

    var event_number = document.querySelector('#event_number').textContent;
    var formData = new FormData();
    
    formData.append("event_number", event_number);
    fetch('../event/api/GetAllEventExpenses.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(response => {
        var tableContainer = document.querySelector('#expen-table-container');
        if(response.length == 0){
            tableContainer.innerHTML = "<p>None expense type registered, try add one</p>";
        }else if(response.length == 1){
            var tableRows = "";
            tableRows += `<h1 id="tt">List of events types</h1>`;
            tableRows += `<table border='1' id='expens-table'>`;
            tableRows += `<thead>`;
            tableRows += `<tr>`;
            tableRows += `<th>Expense</th>`;
            tableRows += `<th>Value</th>`;
            tableRows += `</tr>`;
            tableRows += `</thead>`;
            tableRows += `<tbody>`;
            response.forEach(function(element){
                tableRows += `<tr>`;
                tableRows += `<td>${element.expense}</td>`;
                tableRows += `<td>${element.value}</td>`;
            });
            tableRows += `</tbody`;
            tableRows += `</table>`;
            tableContainer.innerHTML = tableRows;
        }else{
            var table = document.querySelector('#expens-table');
            var tableRows = "";
            tableRows += `<thead>`;
            tableRows += `<tr>`;
            tableRows += `<th>Expense</th>`;
            tableRows += `<th>Value</th>`;
            tableRows += `</tr>`;
            tableRows += `</thead>`;
            tableRows += `<tbody>`;
            response.forEach(function(element){
                tableRows += `<tr>`;
                tableRows += `<td>${element.expense}</td>`;
                tableRows += `<td>${element.value}</td>`;
                tableRows += `</tr>`;
            });
            tableRows += `</tbody`;
            table.innerHTML = tableRows;
        }
    })
    .catch(response => {
        console.log(response);
    });
}

fillTable();