	 <style>
	.btn{margin-top:5px;margin-left:5px;}
	.col-sm-3{margin-top:35px;}
   
</style>

	
	
    <div class="container">
	    <div class="row">
            <div class="col-sm-8">
                <h2>SEASONPOP</h2>
                <p><span style="color:#A34952;">SEASONPOP</span> คือ แอพพริเคชั่นสำหรับโปรโมทกิจกรรมต่างๆ โดยรองรับการทำงานร่วมกับ insTAGram และ Facebook
                    โดยเฉพาะ เว็บไซต์ของเราคือเว็บไซต์โครงข่าย influencer ดังๆ ของประเทศไทยมากมาย หาท่านสนใจอยากจะร่วมกับเราโปรดติดต่อเรา
                    ที่  <span style="color:#A34952;">www.seasionpop.com</span></p>
             
			  
			  
			  
            </div>
            <div class="col-sm-4">
                <h2>Contact Us</h2>
                <address>
                    <strong>บริษัท ดีทีเคแอ็ด จำกัด</strong>
                    <br>เลขที่ 1 อาคารกลาสเฮาส์ 
                    <br>ซอยสุขุมวิท 25 แขวคลองเตยเหนือ เขตวัฒนา
					<br>10110
                </address>
                <address>
                    <abbr title="Phone">Phone :</abbr>(+66) 2-665-2834
                    <br>
                    <abbr title="Email">Email:</abbr> <a href="mailto:#">info@dtkad.com</a>
                </address>
            </div>
        </div>
		<hr>
<!-- Instagram-->
		<div class="row" style="text-align:center;">
        <div class="col-sm-12">

        <div id="cont-headerig">
       <div class="header-content">
                <div class="hcinner">
				
                    <h1>โครงข่าย thai influencer</h1>
                    <h2>"Instagrammer Network"</h2>
                    <ul>
                        <li>
                            <dl class="reachbox">
                                <dt>Followers</dt>
                                <dd>
                                    <?php foreach($follow_total as $data){
											echo number_format($data->followed_by);
											echo "+";
											} 
									 ?>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl class="reachbox">
                                <dt>Likes / Monthly</dt>
                                <dd>
                                    <?php foreach($average as $data){
											echo number_format($data->avglike);
											echo "+";
											}  
									?>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl class="reachbox">
                                <dt>Posts / Monthly</dt>
                                <dd>
                                    <?php foreach($average as $data){
											echo number_format($data->avgpost);
											echo "+";
											}  
									?>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
			
			<div class="header-bg">
                <div class="container-fluid">

                </div>
            </div>
        </div>

        </div>
		</div>
		<hr>
        <div class="row" style="text-align:left;">


        </div>
		<br/>
		<br/>
		<br/>
		

<!-- end Instagram-->
		<hr>
<!-- facebook -->
        <div class="row" style="text-align:center;">
         <div class="col-sm-12">

        <div id="cont-header">
            <div class="header-content">
                <div class="hcinner">
                    <h1>โครงข่าย thai influencer</h1>
                    <h2>"Facebook Network"</h2>
                    <ul>
                        <li>
                            <dl class="reachbox">
                                <dt>Likes</dt>
                                <dd>
								<?php foreach($sumLikes as $data){
                                     echo number_format($data->likes); } ?>+
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl class="reachbox">
                                <dt>Likes / Monthly</dt>
                                <dd>
								<?php foreach($sumLikes as $data){
                                    echo number_format($likes_month); }?>+
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl class="reachbox">
                                <dt>Posts / Day</dt>
                                <dd>
								<?php foreach($sumPost as $data){
                                    echo number_format($data->posts); } ?>+
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
			
            <div class="header-bg">
                <div class="container-fluid">
						<!-- 24 picture -->
						<?php 
							foreach($pic as $data){?>
								 <div class="bg-panel col-lg-2 col-md-2 col-xs-3"><img src="<?php echo $data->picture?>"></div>
						
						<?php
							}
						
						?>
                        
                </div>
            </div>
        </div>
		</div>
		</div>

        <hr>
	<div class="container" >
		<div class = "row" >

			
				

		</div>	
	</div>
<!-- end facebook -->

		<br/>
		<br/>
		<br/>
		<br/>
	<div class="row text-center">
		<div class="page-header">
			<h2> <span class="glyphicon glyphicon-signal" style="color:#d6d6d6;"></span>   HASHTAG TOP HIT! <span class="badge" style="font-size:16px;">250336+</span> <small>จากกิจกรรมทั้งหมด<small></h2>
		</div>
			<a href="home/channel">
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-primary">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-primary">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-primary">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-primary">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-primary">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-primary">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-primary">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-primary">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
				<button type="button" class="btn btn-warning">hashTAGing</button>
				<button type="button" class="btn btn-danger">hashTAGing</button>
			</a>
	</div>
	
  <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
					  <li>
                        <a href="#">6</a>
                    </li>
					  <li>
                        <a href="#">7</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>	  
    </div>
	
	<script>
		function register(){
			document.getElementById("register_form").submit();
		}
	</script>

       
