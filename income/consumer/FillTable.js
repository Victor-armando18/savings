function fillTable(){

    var loggedUserCode = document.querySelector('#logged_user_code').textContent;
    var formData = new FormData();
    
    formData.append("logged_user", loggedUserCode);
    fetch('../income/api/GetAll.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(response => {
        var tableContainer = document.querySelector('#incomes-table-container');
        var json;
        if(response.length == 0){
            tableContainer.innerHTML = "<p>None income registered, try add one</p>";
        }else if(response.length == 1){
            var tableRows = "";
            tableRows += `<h1 id="tt">List of incomes</h1>`;
            tableRows += `<table border='1' id='incomes-table'>`;
            tableRows += `<thead>`;
            tableRows += `<tr>`;
            tableRows += `<th>Year</th>`;
            tableRows += `<th>Month</th>`;
            tableRows += `<th>Value</th>`;
            tableRows += `<th>Action</th>`;
            tableRows += `</tr>`;
            tableRows += `</thead>`;
            tableRows += `<tbody>`;
            response.forEach(function(element, index){
                json = {
                    "user": loggedUserCode,
                    "year": element.year,
                    "month": element.month,
                    "value": element.value
                };
                tableRows += `<tr>`;
                tableRows += `<td>${element.year}</td>`;
                tableRows += `<td>${element.month}</td>`;
                tableRows += `<td>${element.value}</td>`;
                tableRows += `<td><button class="bt" aria-valuetext='${JSON.stringify(json)}'>Delete</button></td>`;
                tableRows += `</tr>`;
            });
            tableRows += `</tbody`;
            tableRows += `</table>`;
            tableContainer.innerHTML = tableRows;
        }else{
            var table = document.querySelector('#incomes-table');
            var tableRows = "";
            tableRows += `<thead>`;
            tableRows += `<tr>`;
            tableRows += `<th>Year</th>`;
            tableRows += `<th>Month</th>`;
            tableRows += `<th>Value</th>`;
            tableRows += `<th>Action</th>`;
            tableRows += `</tr>`;
            tableRows += `</thead>`;
            tableRows += `<tbody>`;
            response.forEach(function(element, index){
                json = {
                    "user": loggedUserCode,
                    "year": element.year,
                    "month": element.month,
                    "value": element.value
                };
                tableRows += `<tr>`;
                tableRows += `<td>${element.year}</td>`;
                tableRows += `<td>${element.month}</td>`;
                tableRows += `<td>${element.value}</td>`;
                tableRows += `<td><button class="bt" aria-valuetext='${JSON.stringify(json)}'>Delete</button></td>`;
                tableRows += `</tr>`;
            });
            tableRows += `</tbody`;
            table.innerHTML = tableRows;
        }
        proccessDelete();
    })
    .catch(response => {
        console.log(response);
    });
}

fillTable();