

<div class="container"><?php echo br(1); ?>
	<center><p><h1>Profile Influencer</h1></p>
 	

 	<a class="btn btn-primary" href="/admin/addinfluform" role="button">เพิ่มข้อมูล</a>
 	<a class="btn btn-primary" href="/admin/logout" role="button" value="">ออกจากระบบ</a>
    </center>
    <?php 
	    echo br(1);
	    echo $this->session->flashdata('msg2');
	?>
	<?php echo br(1); ?> 

		<div class="table-responsive">

		<table class="table"  align="center">
	    <thead >
	      <tr >
	      	<th>picture </th>
	        <th>name </th>
	        <th>firstname </th>
	        <th>lastname </th>
	        <th>e-mail </th>
	      	<th>sex </th>
	        <th>birthday </th>
	        <th>address </th>
	        <th>id_card </th>
	        <th>bank</th>
	        <th>bank_account </th>
	        <th>name_fb </th>
	        <th>facebook_id </th>
	        <th>username_ig </th>
	        <th>access token </th>
	        <th>edit</th>
	        <th>delete</th>
	      </tr>

	    </thead> 

			
	 	<?php
	 		
	 			foreach ($customer as $data) {	
	 				//if($data)
		?>		
	    <tbody> 
	    	
	        <tr class="success">
	        	<td >
	          	<?php if($data->picture =="")
	            		{
	            ?>

	            	<img src = "<?php echo "/profile_images/noimages.png"?> " width="120px;"  height="100px;">
	        	<?php 
		        	}
		        	else
		        	{
		        ?>
 					<img src = "<?php echo "/profile_images/".$data->picture; ?> " width="120px;"  height="100px;">
	       		<?php }	
	       		?>
	       		</td>
	            <td ><?php echo $data->name; ?></td>
	            <td ><?php echo $data->firstname; ?></td>
	            <td ><?php echo $data->lastname; ?></td>
	            <td ><?php echo $data->email; ?></td>
	            <td ><?php echo $data->sex; ?></td>
	            <td ><?php echo $data->birthday; ?></td>	
	            <td ><?php echo $data->address; ?></td>
	            <td ><?php echo $data->id_card; ?></td>
	            <td ><?php echo $data->bank; ?></td>
	            <td ><?php echo $data->bank_account; ?></td>
	            <td ><?php echo $data->fb_id; ?></td>
	            <td ><?php echo $data->name_fb; ?></td>
	            <td ><?php echo $data->usernameIG; ?></td>
	            <td ><?php echo $data->token; ?></td> 

	            <td><a class="btn btn-primary" href="/Admin/updateinfluform?edit=<?php echo $data->id_influ; ?>" id="edit" name="edit" role="button">Edit</a> </td>
	            
	       
                <td><a href class="btn btn-primary"  data-toggle="modal" data-target="#deleted<?php echo $data->id_influ; ?>">Delete</a></td>
	      
	        </tr>

        </tbody>
        <?php 
        }// end foreach 
 		?>
	  	</table>
	  </div>


    <?php foreach ($customer as $data) { ?>
    <!-- Modal for delete id <?php echo $data->id_influ; ?> -->
<div id="deleted<?php echo $data->id_influ; ?>" class="modal fade" role="dialog"  >
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Influenter</h4>
      </div>
      <div class="modal-body">
        <p>Do you want to delete profile influencer?.</p>
      </div>
      <div class="modal-footer">

      	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='/Admin/deleteinflu?delete=<?php echo $data->id_influ; ?>'">Yes</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="n">No</button> 
      </div>
    </div>

  </div>
</div>

    <?php } ?>


<center><?php echo $pagination; ?></center>
</div>

