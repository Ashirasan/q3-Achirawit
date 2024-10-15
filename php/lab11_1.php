<html>
    <head><meta charset="utf-8">
    <script>
    var xmlHttp;
    function checkUsername() {
        document.getElementById("username").className = "form-control thinking";
        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = showUsernameStatus;
        var username = document.getElementById("username").value;
        var url = "./callphp/lab11_1_call.php?username=" + username;
        xmlHttp.open("GET",url);
        xmlHttp.send();
        
    }

    function showUsernameStatus() {
        if(xmlHttp.readyState==4 && xmlHttp.status == 200){
            
            if(xmlHttp.responseText == 1){
                document.getElementById("username").className = "form-control approved";
            }else if(xmlHttp.responseText == 0){
                document.getElementById("username").className = "form-control denied";
                document.getElementById("username").focus();
				document.getElementById("username").select();
            }
        }
    }
</script>

<style>
.thinking { 
	background: white url("./assets/checking.gif") no-repeat; 
	background-position: 180px 12px;  
}

.approved { 
	background: white url("./assets/true.gif") no-repeat; 
	background-position: 180px 12px;   
}

.denied { 
	background: #FF8282 url("./assets/false.gif") no-repeat; 
	background-position: 180px 12px;    
}
</style>

    </head>
    <body>
        <div class="container">
        <div class="row">
        <form class="card-body cardbody-color p-lg-5">
            <h2>Registy</h2 >
            <div class="mb-3">
              Username: <input type="text" id="username" name="username" class="form-control" onblur="checkUsername()">
            </div>
            <div class="mb-3">
              First name: <input type="text" name="firstname" class="form-control">
            </div>
            <div class="mb-3">
              Last name: <input type="text" name="lastname" class="form-control">
            </div>
            <div class="mb-3">
              Email: <input type="text" name="email" class="form-control">
            </div>

        </form>
        </div></div>
    </body>
</html>



