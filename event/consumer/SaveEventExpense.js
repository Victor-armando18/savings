document.querySelector('#create-expen-form').addEventListener('submit', function(event){
    event.preventDefault();
    fetch('../event/api/SaveEventExpense.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.text())
    .then(response => {
        var alertMessage = document.querySelectorAll('.alert-message')[0];
        setTimeout(function(){
            alertMessage.innerHTML = "";
            clearTimeout(this);
            document.querySelector('#create-expen-form').reset();
        }, 2000)
        alertMessage.innerHTML = response;
        fillTable();
    })
    .catch(response => {
        console.log(response);
    });
});