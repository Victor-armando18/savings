function fillTable(){

    var loggedUserCode = document.querySelector('#logged_user_code').textContent;
    var formData = new FormData();
    
    formData.append("logged_user", loggedUserCode);
    fetch('../expense_type/api/GetAll.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(response => {
        var tableContainer = document.querySelector('#table-container');
        if(response.length == 0){
            tableContainer.innerHTML = "<p>None expense type registered, try add one</p>";
        }else if(response.length == 1){
            var tableRows = "";
            tableRows += `<h1 id="tt">List of expenses types</h1>`;
            tableRows += `<table border='1' id='expenses-types-table'>`;
            tableRows += `<thead>`;
            tableRows += `<tr>`;
            tableRows += `<th>Description</th>`;
            tableRows += `</tr>`;
            tableRows += `</thead>`;
            tableRows += `<tbody>`;
            response.forEach(function(element){
                tableRows += `<tr>`;
                tableRows += `<td>${element.name}</td>`;
                tableRows += `</tr>`;
            });
            tableRows += `</tbody`;
            tableRows += `</table>`;
            tableContainer.innerHTML = tableRows;
        }else{
            var table = document.querySelector('#expenses-types-table');
            var tableRows = "";
            tableRows += `<thead>`;
            tableRows += `<tr>`;
            tableRows += `<th>Description</th>`;
            tableRows += `</tr>`;
            tableRows += `</thead>`;
            tableRows += `<tbody>`;
            response.forEach(function(element){
                tableRows += `<tr>`;
                tableRows += `<td>${element.name}</td>`;
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