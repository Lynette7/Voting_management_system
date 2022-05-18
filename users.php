<style>
	table{
        width: 100%;
        border-collapse: collapse;
        border-radius: 5px;
        margin-top: 10px;
    }
    thead{
        background-color: lightgray;
    }
    th, td {
        width: 150px;
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }
    td:nth-child(even){
        background-color: #fff;
    }
	.new-user{
        background: lightseagreen;
        color: #fff;
        cursor: pointer;
        height: 50px;
        width: 100px;
        border: none;
        border-radius: 5px;
		margin-top: 20px;
    }
	.edit_user{
        background: grey;
        color: #fff;
        cursor: pointer;
        height: 25px;
        width: 70px;
        border: none;
        border-radius: 5px;
    }
    .delete_user{
        color: #fff;
        background: darkred;
        cursor: pointer;
        height: 25px;
        width: 70px;
        border: none;
        border-radius: 5px;
    }
	a{
		color: white;
	}
</style>

	<div class="newuser-button">
			<button class="new-user" id="new_user"><i class="fa fa-plus"></i> New user</button>
	</div>
	<br>
			<div class="card-body">
				<table class="user-table">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Username</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include 'db_connect.php';
							$users = $conn->query("SELECT * FROM users order by name asc");
							$i = 1;
							while($row= $users->fetch_assoc()):
						?>
						<tr>
							<td>
								<?php echo $i++ ?>
							</td>
							<td>
								<?php echo $row['name'] ?>
							</td>
							<td>
								<?php echo $row['username'] ?>
							</td>
							<td>
								<div class="action-buttons">
									<button class="edit_user"><a class="edit" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a></button>
									<button class="delete_user"><a class="delete" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a></button>
								</div>
							</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
<script>
	
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})

</script>