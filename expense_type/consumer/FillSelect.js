function fillSelect(element){

    var loggedUserCode = document.querySelector('#logged_user_code').textContent;
    var formData = new FormData();
    
    formData.append("logged_user", loggedUserCode);
    fetch('../expense_type/api/GetAll.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(response => {
        var rows = "";
        if(response.length == 0){
            rows += `<option value=''>Select an expense type</option>`;
        }else if(response.length == 1){
            rows += `<option value=''>Select an expense type</option>`;
            response.forEach(function(e){
                rows += `<option value='${e.name}'>${e.name}</option>`;
            });
        }else{
            rows += `<option value=''>Select an expense type</option>`;
            response.forEach(function(e){
                rows += `<option value='${e.name}'>${e.name}</option>`;
            });
        }
        element.innerHTML = rows;
    })
    .catch(response => {
        console.log(response);
    });
}

fillSelect(document.querySelector('#c1'));