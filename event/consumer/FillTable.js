function fillTable(){

    var loggedUserCode = document.querySelector('#logged_user_code').textContent;
    var formData = new FormData();
    
    formData.append("logged_user", loggedUserCode);
    fetch('../event/api/GetAll.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(response => {
        var tableContainer = document.querySelector('#event-table-container');
        if(response.length == 0){
            tableContainer.innerHTML = "<p>None expense type registered, try add one</p>";
        }else if(response.length == 1){
            var evt_n = document.querySelector('#event_number').textContent;
            var tableRows = "";
            tableRows += `<h1 id="tt">Expenses list of Event #${evt_n}</h1>`;
            tableRows += `<table border='1' id='events-table'>`;
            tableRows += `<thead>`;
            tableRows += `<tr>`;
            tableRows += `<th>Number</th>`;
            tableRows += `<th>Year</th>`;
            tableRows += `<th>Date</th>`;
            tableRows += `<th>Registration Date</th>`;
            tableRows += `<th>Registration Time</th>`;
            tableRows += `<th>Action</th>`;
            tableRows += `</tr>`;
            tableRows += `</thead>`;
            tableRows += `<tbody>`;
            response.forEach(function(element){
                tableRows += `<tr>`;
                tableRows += `<td>${element.number}</td>`;
                tableRows += `<td>${element.year}</td>`;
                tableRows += `<td>${element.date}</td>`;
                tableRows += `<td>${element.registration_date}</td>`;
                tableRows += `<td>${element.registration_time}</td>`;
                tableRows += 
                    `<td>
                        <button class="bt">
                            <a class="bt" href="home.php?logged_user=${loggedUserCode}&expenses&event_number=${element.number}">
                                View Expenses
                            </a>
                        </button>
                    </td>`;
                tableRows += `</tr>`;
            });
            tableRows += `</tbody`;
            tableRows += `</table>`;
            tableContainer.innerHTML = tableRows;
        }else{
            var table = document.querySelector('#events-table');
            var tableRows = "";
            tableRows += `<thead>`;
            tableRows += `<tr>`;
            tableRows += `<th>Number</th>`;
            tableRows += `<th>Year</th>`;
            tableRows += `<th>Date</th>`;
            tableRows += `<th>Registration Date</th>`;
            tableRows += `<th>Registration Time</th>`;
            tableRows += `<th>Action</th>`;
            tableRows += `</tr>`;
            tableRows += `</thead>`;
            tableRows += `<tbody>`;
            response.forEach(function(element){
                tableRows += `<tr>`;
                tableRows += `<td>${element.number}</td>`;
                tableRows += `<td>${element.year}</td>`;
                tableRows += `<td>${element.date}</td>`;
                tableRows += `<td>${element.registration_date}</td>`;
                tableRows += `<td>${element.registration_time}</td>`;
                tableRows += 
                    `<td>
                        <button class="dl">
                            <a class="bt" href="home.php?logged_user=${loggedUserCode}&expenses&event_number=${element.number}">
                                Delete
                            </a>
                        </button>
                        <button class="bt">
                            <a class="bt" href="home.php?logged_user=${loggedUserCode}&expenses&event_number=${element.number}">
                                View Expenses
                            </a>
                        </button>
                    </td>`;
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