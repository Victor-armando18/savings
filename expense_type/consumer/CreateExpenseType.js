document.querySelector('#create-expense-form').addEventListener('submit', function(event){
    event.preventDefault();
    fetch('../expense_type/api/Save.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.text())
    .then(response => {
        var alertMessage = document.querySelectorAll('.alert-message')[0];
        setTimeout(function(){
            alertMessage.innerHTML = "";
            clearTimeout(this);
            document.querySelector('#name').value = "";
        }, 2000)
        alertMessage.innerHTML = response;
        fillTable();
    })
    .catch(response => {
        console.log(response.text());
    });
});