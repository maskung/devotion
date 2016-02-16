<?php echo br(2); ?>
<center><p><h1>login</h1></p></center>
<?php echo br(1); ?>
<div class="container">
	<div class="col-sm-1"></div>
	<div class="col-sm-10" >
		<?php echo $this->session->flashdata('msg1'); ?>
			<?php   $form_attrib = array('class' => 'form-horizontal', 'id' => 'form_members', 'role' => 'form');
					echo form_open_multipart('/admin/login',$form_attrib); ?>

			<div class="form-group " >
				<div class="col-sm-3" align="right">Username &nbsp;<span style="color:red;" >*</span></div>
			    <div class=" col-sm-5">
			    	<?php $data = array( 
				    	'class' => 'form-control',
				    	'name' => 'admin_name', 
				    	'id' => 'admin_name', 
				    	'placeholder' =>'Username', 
				    	'value' =>  set_value('') 
				    				
				    ); 
			    	echo form_input($data); 
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("admin_name", "<font color='error'>","</font>"); ?></div> 
			</div>
			<div class="form-group" align="right">
		    	<div  class="col-sm-3" >Password  &nbsp;<span style="color:red;" >*</span></div>
			    <div class="col-sm-5">
			    	<?php 
				    	$data = array( 
				    		'class' => 'form-control',
				    		'name' => 'admin_password', 
				    		'id' => 'admin_password', 
				    		'placeholder' =>'Password', 
				    		'value' => set_value('admin_password')
				    					
				    	); 
				    	echo form_password($data); 
				    	
			    	?>
			    	
			    </div>
			    <div class="col-sm-4" align="left"><?php echo form_error("admin_password", "<font color='error'>","</font>") ; ?></div>
			    
			</div>
			
			<div class="form-group">
				<div class="col-sm-3"></div>
			    <div class="col-sm-3" align="right">
			        <!--button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button-->
			        <?php 
				    	$data = array(
						    'name' => 'btn_login',
						    'id' => 'btn_login',
						    'value' => 'Login',
						    'type' => 'submit',
						    'content' => 'login');
				    		echo form_button($data);
			    	?>
			    </div>
			    <div class="col-sm-3" align="left">
			        <!--button type="reset" class="btn btn-warning" name="reset" id="reset">Reset</button-->
			         <?php 
				    	$data = array(
						    'name' => 'btn_cancel',
						    'id' => 'btn_cancel',
						    'value' => 'Cancel',
						    'type' => 'reset',
						    'content' => 'cancel');
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
			<?php echo $this->session->flashdata('msg'); ?>

			
		
	</div>
	<div class="col-sm-1"></div>
</div>
