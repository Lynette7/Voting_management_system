<style>
	.custom-menu {
        z-index: 1000;
	    position: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
a.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 1px 11px;
}
	span.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
/*table th,td{
	border-left:1px solid gray;
}*/
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}
.candidate {
    margin: auto;
    width: 23vw;
    padding: 0 10px;
    border-radius: 20px;
    margin-bottom: 1em;
    display: flex;
    border: 3px solid #00000008;
    background: #8080801a;

}
.candidate_name {
    margin: 8px;
    margin-left: 3.4em;
    margin-right: 3em;
    width: 100%;
}
	.img-field {
	    display: flex;
	    height: 8vh;
	    width: 4.3vw;
	    padding: .3em;
	    background: #80808047;
	    border-radius: 50%;
	    position: absolute;
	    left: -.7em;
	    top: -.7em;
	}
	
	.candidate img {
    height: 100%;
    width: 100%;
    margin: auto;
    border-radius: 50%;
}
.vote-field {
    position: absolute;
    right: 0;
    bottom: -.4em;
}
main{
        margin-top: 65px;
        padding: 1.5rem 1.5rem;
        background: #f1f5f9;
        min-height: calc(100vh - 90px);
    }
    .cards{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 2rem;
        margin-top: 1rem;
        padding-bottom: 10px;
    }
    .card-single{
        display: flex;
        justify-content: space-between;
        background: teal;
        padding: 2rem;
        border-radius: 15px;
    }
    .card-single div:last-child span{
        font-size: 3rem;
        color: teal;
    }
    .card-single div:first-child h2{
        color: grey;
    }
    .titles h1{
        color: teal;
    }
    .titles h1{
        margin-left: 300px;
        padding-top: 10px;
    }
    .titles h2{
        padding-bottom: 10px;
        margin-left: 300px;
		color: black;
        /*padding-top: 10px;*/
    }
	b{
		color: black;
	}
    .candidate {
        margin: auto;
        width: 23vw;
        padding: 0 10px;
        border-radius: 20px;
        margin-bottom: 1em;
        display: flex;
        border: 3px solid #00000008;
        background: #8080801a;

    }
    .candidate_name {
        margin: 8px;
        margin-left: 3.4em;
        margin-right: 3em;
        width: 100%;
    }
    .img-field {
        display: flex;
        height: 8vh;
        width: 4.3vw;
        padding: .3em;
        background: #80808047;
        border-radius: 50%;
        position: absolute;
        left: -.7em;
        top: -.7em;
    }
    .candidate img {
        height: 100%;
        width: 100%;
        margin: auto;
        border-radius: 50%;
    }
    .vote-field {
        position: absolute;
        right: 0;
        padding-right: 10px;
        bottom: 0.4em;
    }
</style>
<?php include('db_connect.php') ;
                $voting = $conn->query("SELECT * FROM voting_list where  is_default = 1 ");
                foreach ($voting->fetch_array() as $key => $value) {
                    $$key = $value;
                }
                $votes  = $conn->query("SELECT * FROM votes where voting_id = $id ");
                $v_arr = array();
                while($row=$votes->fetch_assoc()){
                    if(!isset($v_arr[$row['voting_opt_id']]))
                        $v_arr[$row['voting_opt_id']] = 0;

                        $v_arr[$row['voting_opt_id']] += 1;
                }
                $opts = $conn->query("SELECT * FROM voting_opt where voting_id=".$id);
                $opt_arr = array();
                while($row=$opts->fetch_assoc()){
                    $opt_arr[$row['category_id']][] = $row;

                }
            ?>
            <div class="cards">
                <div class="card-single">
                    <div>
                    <h2><b>Total Voters:</b></h2>
                    <h1 class="text-right"><b><?php echo $conn->query('SELECT * FROM users where type = 2 ')->num_rows ?> voters</b></h1>
                    </div>
                    <div>
					<span class="card-icon"><i class="fa-solid fa-users"></i></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                    <h2><b>Total Votes:</b></h2>
                    <h1 class="text-right"><b><?php echo $conn->query('SELECT distinct(user_id) FROM votes where voting_id = '.$id)->num_rows ?>  votes</b></h1>
                    </div>
                    <div>
					<span class="card-icon"><i class="fa-solid fa-user-check"></i></span>
                    </div>
                </div>
            </div>
            <hr>
			<div class="card">
				<div class="card-body">
					<div class="titles">
						<h1><b><?php echo $title ?></b></h1>
						<small style="padding-left: 400px;"><?php echo $description; ?></small>	
					</div>
					<?php 
					$cats = $conn->query("SELECT * FROM category_list where id in (SELECT category_id from voting_opt where voting_id = '".$id."' )");
					while($row = $cats->fetch_assoc()):
					?>
						<hr>
								<div class="titles">
									<h3><b><?php echo $row['category'] ?></b></h3>
								</div>
						<div class="images">
                            <?php foreach ($opt_arr[$row['id']] as $candidate) {
                            ?>
                                <div class="candidate" style="position: relative;">
                                    <div class="img-field">
                                        <img src="Resources/Images/<?php echo $candidate['image_path'] ?>" alt="">
                                    </div>
                                    <div class="candidate_name"><?php echo $candidate['opt_txt'] ?></div>
                                    <div class="vote-field">
                                        <i class="fa-solid fa-badge-check"><large style="font-style:sans-serif;"><b><?php echo isset($v_arr[$candidate['id']]) ? number_format($v_arr[$candidate['id']]) : 0 ?></b></large></i>
                                    </div>
                                </div>
                            <?php } ?>
						</div>
					<?php endwhile; ?>					
				</div>
			</div>

	
<script>
	
</script>-->