<?php 
    //session_destroy();
    //header("Location: index.php");
    session_start();
    include "themes/entete.php"; 
    include "themes/menu.php"; 
    require('connection.php');
    //verifier si logge ici 
    if(isset($_SESSION['user']) && ($_SESSION['pass'])) 
    { 
        //header('Location: magasinage_membres.php');
    }
?>
<section id="header" class="header-one">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                <div class="header-thumb text-align:center" id="frm">
                    <h1>Login</h1>
                    <form name="f1" action="authentification.php" onsubmit="return validation()" method="POST">
                        <p>
                            <label>Username :</label>
                            <input type="text" id="user" name="user">
                        </p>
                        <p>
                            <label>Password :</label>
                            <input type="password" id="pass" name="pass">
                        </p>
                        <p>
                            <input type="submit" id="btnSubmit" value="Login">
                        </p>
                    </from>  
                </div>
			</div>
		</div>
	</div>		
</section>
<script>
    function validation()
    {
        var id=document.f1.user.value;
        var ps=document.f1.pass.value;

        if(id.length == "" && ps.length == "")
        {
            alert("Les champs username et password sont obligatoires");
            return false;
        }
        else
        {
            if(id.length == "")
            {
                alert("Les champs username est obligatoire");
                return false;
            }
            if(ps.length == "")
            {
                alert("Les champs password est obligatoire");
                return false;
            }
        }
    }

    //$_SESSION['user'];
    //$_SESSION['pass'];
</script>
<?php include "themes/footer.php"; ?>
