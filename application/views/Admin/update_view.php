
<?php echo br(2); ?>
<center><p><h1>edit profile influencer</h1></p></center>
<?php echo br(2); ?>
<div class="container">
	<div class="col-sm-1"></div>
	<div class="col-sm-10" >

			<!--form class="form-horizontal"  action="/Admin/addinflu"  method="post" id="form_members" role="form" enctype="multipart/form-data"-->
			<?php //echo validation_errors(); ?>
			<?php   $form_attrib = array('class' => 'form-horizontal', 'id' => 'form_members', 'role' => 'form' ,'method'=>'post');
					echo form_open_multipart('/admin/updateinflu',$form_attrib); ?>

			<div class="form-group " >
				<div class="col-sm-3" align="right">Name &nbsp;<span style="color:red;" >*</span></div>
			    <div class=" col-sm-5">
			    	<?php $data = array( 
				    	'class' => 'form-control',
				    	'name' => 'name', 
				    	'id' => 'name', 
				    	'placeholder' =>'Name', 
				    	'value' => $customer->name 
				    				
				    ); 
			    	echo form_input($data); 
			    	
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("name", "<font color='error'>","</font>"); ?></div>
			    
			 
			</div>
			<div class="form-group" align="right">
		    	<div  class="col-sm-3" >First Name  &nbsp;<span style="color:red;" >*</span></div>
			    <div class="col-sm-5">
			    	<?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'firstname', 
				    		'id' => 'firstname', 
				    		'placeholder' =>'Firstame', 
				    		'value' => $customer->firstname
				    					
				    	); 
				    	echo form_input($data); 
				    	
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("firstname", "<font color='error'>","</font>") ; ?></div>
			    
			</div>
			<div class="form-group" align="right">
			    <div class="col-sm-3">Last Name  &nbsp;<span style="color:red;" >*</span></div>
			    <div class="col-sm-5">
			    	
			    	<?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'lastname', 
				    		'id' => 'lastname', 
				    		'placeholder' =>'Lastname', 
				    		'value' => $customer->lastname
				    	); 
				    	echo form_input($data); 
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("lastname", "<font color='error'>","</font>") ?></div>
			</div>
			<div class="form-group" align="right">
			    <div class="col-sm-3">E-mail &nbsp;<span style="color:red;" >*</span></div>
			    <div class="col-sm-5">
			    	
			    	<?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'email', 
				    		'id' => 'email', 
				    		'placeholder' =>'email', 
				    		'value' => $customer->email
				    	); 
				    	echo form_input($data); 
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("email", "<font color='error'>","</font>") ?></div>
			</div>
			<div class="form-group">
			    <div class="col-sm-3" align="right">Sex &nbsp;<span style="color:red;" >*</span></div>
		    	<div class="col-sm-5" >
			        <div class="radio-inline">
			        	Male
						<?php 
					        $data = array(
								'name'        => 'sex',
								'id'          => 'male',
								'value'       => 'm',
								'checked'     => $customer->sex,
								'style'       => 'margin:10px',
							);
							echo form_radio($data);
						?>
						
			        </div>
			        <div class="radio-inline">
			        	 Female
			        	<?php 
					        $data = array(
								'name'        => 'sex',
								'id'          => 'female',
								'value'       => 'f',
								'checked'     => $customer->sex,
								'style'       => 'margin:10px',
							);
							echo form_radio($data);

						?>

			        </div> 
		    	</div>
		    	<div class="col-sm-4" align="left"><?php echo form_error("sex", "<font color='error'>","</font>") ?></div>
		    </div><?php echo br(1); ?>
		    <div class="form-group">
		    	<div class="col-sm-3" align="right">Date of Birth  </div>
			    <div class="col-sm-5" align="left">
			    	<?php
						$date = array(
							'type' => 'date',
							'id' => 'birthday',
							'name' => 'birthday',
							'class' => 'form-control',
							'placeholder' => 'dd/mm/yyyy',
							'value' => $customer->birthday
							
							);
						echo form_input($date);
			    	?>
			    </div>
			 	<div class="col-sm-4" align="left"></div>
			   </div>
			<div class="form-group" >
				<div class="col-sm-3" align="right">File input</div>
			    <div class="col-sm-5" align="left">
			       <?php 
				    	$data = array( 
				    		
				    		'name' => 'picture', 
				    		'id' => 'picture', 
				    		'accept'=>'image/x-png;image/gif;image/jpeg',
				    		'value' => $customer->picture
				    	); 
				    		echo form_upload($data); 
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"></div>
			    
			</div>
			<div class="form-group" align="right">
			    <div  class="col-sm-3">Address</div>
			   	<div class="col-sm-5">
		        	<?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'address', 
				    		'id' => 'address', 
				    		'placeholder' =>'Address', 
				    		'value' => $customer->address
				    	); 
				    		echo form_textarea($data); 
			    	?>
		   		</div>
		   		<div class="col-sm-4" align="left"></div>
			</div>
			<div class="form-group" align="right">
			    <div class="col-sm-3">ID_Card  </div>
			    <div class="col-sm-5">
			  
			      	<?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'id_card', 
				    		'id' => 'id_card', 
				    		'placeholder' =>'ID_Card', 
				    		'value' => $customer->id_card
				    	); 
				    		echo form_input($data); 
			    	?>	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("id_card", "<font color='error'>","</font>") ?></div>
			    	
			</div>
			<div class="form-group" align="right">
			    <div  class="col-sm-3">Bank </div>
			    <div class="col-sm-5">
			      
			        <?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'bank', 
				    		'id' => 'bank', 
				    		'placeholder' =>'bank', 
				    		'value' => $customer->bank
				    	); 
				    		echo form_input($data); 
			    	?>
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("bank", "<font color='error'>","</font>") ?></div>
			</div>
			<div class="form-group" align="right">
			    <div  class="col-sm-3">Bank_Account  </div>
			    <div class="col-sm-5">
			      
			        <?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'bank_account', 
				    		'id' => 'bank_account', 
				    		'placeholder' =>'bank_account', 
				    		'value' => $customer->bank_account
				    	); 
				    		echo form_input($data); 
			    	?>
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("bank_account", "<font color='error'>","</font>") ?></div>
			</div>
			<div class="form-group" align="right">
			    <div  class="col-sm-3">FacebookID  </div>
			    <div class="col-sm-5">
			 
			        <?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'fb_id', 
				    		'id' => 'fb_id', 
				    		'placeholder' =>'fb_id', 
				    		'value' => $customer->fb_id
				    	); 
				    		echo form_input($data); 
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("fb_id", "<font color='error'>","</font>") ?></div>
			</div>
			<div class="form-group" align="right">
			    <div  class="col-sm-3">FacebookName </div>
			    <div class="col-sm-5">
			     
			        <?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'name_fb', 
				    		'id' => 'name_fb', 
				    		'placeholder' =>'name_fb', 
				    		'value' => $customer->name_fb
				    	); 
				    		echo form_input($data); 
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("name_fb", "<font color='error'>","</font>") ?></div>
			</div>
			<div class="form-group" align="right">
			    <div  class="col-sm-3">Username_IG</div>
			    <div class="col-sm-5">
			     
			        <?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'usernameIG', 
				    		'id' => 'usernameIG', 
				    		'placeholder' =>'usernameIG', 
				    		'value' => $customer->usernameIG
				    	); 
				    		echo form_input($data); 
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("usernameIG", "<font color='error'>","</font>") ?></div>
			</div>  
			<div class="form-group" align="right">
			    <div  class="col-sm-3">Access_token </div>
			    <div class="col-sm-5">
			     
			        <?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'token', 
				    		'id' => 'token', 
				    		'placeholder' =>'token', 
				    		'value' => $customer->token
				    	); 
				    		echo form_input($data); 
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("token", "<font color='error'>","</font>") ?></div>
			</div>  


			<!--input type="hidden" name="id" value=<?php echo $customer->id_influ; ?>  id="did" -->
					
					<?php 
				    	$data = array(

				    		'edit'=>  $customer->id_influ
				    	);
				    		echo form_hidden($data);
			    	?>

			<div class="form-group">
				<div class="col-sm-3"></div>
			    <div class="col-sm-3" align="right">
			        <!--button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button-->
			        <?php 
				    	$data = array(
						    'name' => 'submit',
						    'id' => 'submit',
						    'value' => 'true',
						    'type' => 'submit',
						    'content' => 'Submit');
				    		echo form_button($data);
			    	?>
			    </div>
			    <div class="col-sm-3" align="left">
			        <!--button type="reset" class="btn btn-warning" name="reset" id="reset">Reset</button-->
			         <?php 
				    	$data = array(
						    'name' => 'reset',
						    'id' => 'reset',
						    'value' => 'true',
						    'type' => 'reset',
						    'content' => 'Reset');
				    		echo form_button($data);
			    	?>
			    </div> 
			    <div class="col-sm-3"></div>
			</div>
			<!--</form>-->
			<?php
				$string = "</div></div>";

				echo form_close($string);
			?>
		
	</div>
	<div class="col-sm-1"></div>
</div>
