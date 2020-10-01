function getCount(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "./Model/notification_counter.php", true);
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // console.log(this.responseText);
            if(this.responseText > 0){
                document.getElementById('icon').className = 'fas fa-bell';
                document.getElementById('notify').className = 'num numberCircle';
                document.getElementById('notify').textContent = this.responseText;                        
            }

        }
    }
    xmlhttp.send();
}
getCount();