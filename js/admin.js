let authName = document.getElementById('authName')
let authPass = document.getElementById('authPass')

let authBtn = document.getElementById('authBtn')

authBtn.onclick = function() {
    auth();
}

       

    
   function auth() {
      
        $.post(

        "core.php",
        {
            "action" : "auth",
            "authName" : authName.value,
            "authPass" : authPass.value

        }, function(data) {
            if(data == 'ok') {
                //document.location.href = 'http://localhost/invent/';
                document.location.href = 'http://192.168.58.68/invent/';
            } else {
                alert(data)
            }
        }
    )
} 

/////////////


