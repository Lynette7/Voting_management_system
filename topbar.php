<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
	}
	h2{
		color: white;
		margin-left: 20px;
		margin-top: 10px;
	}
	i{
		color: white;
	}
	li{
		color: teal;
		margin-right: 10px;
	}
	.user-wrapper{
		margin-right: 15px;
	}
	.navbar{
		margin-bottom: 10px;
	}
</style>
	
<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
		<h2>
                <label for="">
                    <i class="fa-solid fa-bars"></i>
                </label>
    
                Dashboard
        </h2>
		<div class="user-wrapper">
                <i class="fa-solid fa-user"> <small> <?php echo $_SESSION['login_name'] ?></small></i>
                <li><a href="ajax.php?action=logout"><small>Logout</small></a></li>
            </div>
  
</nav>
