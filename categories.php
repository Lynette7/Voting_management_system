<?php include('db_connect.php');?>
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
	.save{
        background: teal;
        color: #fff;
        cursor: pointer;
        height: 50px;
        width: 100px;
        border: none;
        border-radius: 5px;
    }
    .cancel{
        color: #fff;
        background: grey;
        cursor: pointer;
        height: 50px;
        width: 100px;
        border: none;
        border-radius: 5px;
    }
	.edit_cat{
        background: grey;
        color: #fff;
        cursor: pointer;
        height: 25px;
        width: 70px;
        border: none;
        border-radius: 5px;
    }
    .delete_cat{
        color: #fff;
        background: darkred;
        cursor: pointer;
        height: 25px;
        width: 70px;
        border: none;
        border-radius: 5px;
    }
</style>

			<!-- FORM -->
			<form action="" id="manage-category">
				<div class="card">
					<div class="card-header">
						    <b>Category Form</b>
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Category Name</label>
								<input type="text" class="form-control" name="category">
							</div>
					</div>
					<div class="card-footer">
								<button class="save"> Save</button>
								<button class="cancel" type="button" onclick="$('#manage-category').get(0).reset()"> Cancel</button>
					</div>
				</div>
			</form>
			<!-- FORM -->
			<br><br>
			<!-- Table -->
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Category</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM category_list order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $row['category'] ?></td>
									<td class="text-center">
										<button class="edit_cat" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['category'] ?>">Edit</button>
										<button class="delete_cat" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			<!-- Table -->

<script>
	$('#manage-category').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_category',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_cat').click(function(){
		start_load()
		var cat = $('#manage-category')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='category']").val($(this).attr('data-name'))
		end_load()
	})
	$('.delete_cat').click(function(){
		_conf("Are you sure to delete this category?","delete_cat",[$(this).attr('data-id')])
	})
	function delete_cat($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_category',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>