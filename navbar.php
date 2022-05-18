
<style>
	.sidenavbar{
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        background: teal;
        z-index: 100;
    }
    .sidebar-logo{
        height: 90px;
        padding: 1rem 0rem 1rem 2rem;
        color: #fff;
    }
    .sidebar-logo i {
        display: inline-block;
        padding-right: 1rem;

    }
    .sidebar-menu{
        margin-top: 1rem;
    }
    .sidebar-menu li{
        width: 100%;
        margin-bottom: 1.7rem;
        padding-left: 1rem;
    }
    .sidebar-menu a{
        padding-left: 1rem;
        display: block;
        color: #fff;
        font-size: 1.1rem;
    }
    .sidebar-menu a span:first-child{
        font-size: 1.5rem;
        padding-right: 1rem;
    }
    .sidebar-menu a.active{
        background: #fff;
        padding-top: 1rem;
        padding-bottom: 1rem;
        color: teal;
        border-radius: 30px 0px 0px 30px;
    }
</style>

<nav id="sidebar">
<div class="sidenavbar">
        <div class="sidebar-logo">
            <h2><i class="fa-solid fa-check-to-slot"></i> eVote</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php?page=home"><i class="fa-solid fa-house"></i>
                    <span>Home</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="index.php?page=voting_list"><i class="fa-solid fa-square-poll-horizontal"></i>
                    <span>Elections</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="index.php?page=categories"><i class="fa-solid fa-list-ul"></i>
                    <span>Categories</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="index.php?page=users"><i class="fa-solid fa-people-group"></i>
                    <span>Voters</span></a>
                </li>
            </ul>
        </div>
</div>
</nav>

<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>