document.querySelector('#create-account-form').addEventListener('submit', function(event){
    event.preventDefault();
    fetch('../user/api/Save.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.text())
    .then(response => {
        var alertMessage = document.querySelectorAll('.alert-message')[0];
        alertMessage.innerHTML = response;
    })
    .catch(response => {
        console.log(response.text());
    });
});