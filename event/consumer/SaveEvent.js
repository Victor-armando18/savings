document.querySelector('#create-event-form').addEventListener('submit', function(event){
    event.preventDefault();
    fetch('../event/api/Save.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.text())
    .then(response => {
        var alertMessage = document.querySelectorAll('.alert-message')[0];
        setTimeout(function(){
            alertMessage.innerHTML = "";
            clearTimeout(this);
            var currentDate = new Date();
            document.querySelector('#c1').value = currentDate.getFullYear();
            document.querySelector('#c2').reset();
        }, 2000)
        fillTable();
        alertMessage.innerHTML = response;
    })
    .catch(response => {
        console.log(response.text());
    });
});