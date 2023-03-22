function proccessDelete(){
    document.querySelectorAll('.bt').forEach(function(element){
        element.addEventListener('click', function(){
            // debugger
            console.log(element.ariaValueText);
            var form = new FormData();
            form.append("data", element.ariaValueText);
            fetch('../income/api/Delete.php', {
                method: 'POST',
                body: form
            })
            .then(response => response.text())
            .then(response => {
                var alertMessage = document.querySelectorAll('.alert-message')[0];
                setTimeout(function(){
                    alertMessage.innerHTML = "";
                    clearTimeout(this);
                    var currentDate = new Date();
                    document.querySelector('#c1').value = currentDate.getFullYear();
                    document.querySelector('#c2').value = currentDate.getMonth()+1;
                    document.querySelector('#c3').value = "0,00";
                }, 2000)
                fillTable();
                alertMessage.innerHTML = response;
            })
            .catch(response => {
                console.log(response.text());
            });
        });
    });
}