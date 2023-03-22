document.querySelector('#login-form').addEventListener('submit', function(event){
    event.preventDefault();
    fetch('../user/api/Authentication.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(response => {
        var alertMessage = document.querySelectorAll('.alert-message')[1];
        if(response.error != null){
            alertMessage.innerHTML = `<p class="error">${response.error}</p>`;
        }else{
            setTimeout(function(){
                alertMessage.innerHTML = "";
                clearTimeout(this);
                document.querySelector('#login-form').reset();
                window.document.location.href = "view/home.php?logged_user="+response.email;
            }, 2000)
            alertMessage.innerHTML = `<p class="success">Be welcome, ${response.name}</p>`;
        }
    })
    .catch(response => {
        console.log(response);
    });
});