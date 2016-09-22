	<style>
		* {
			margin:0;
			padding:0;
		}
		#wrapper-header{
			background:#f9f9f9;
			
		}
		#slider-container {
			padding : 8px 0 0 0;	
			margin : 0px auto;
		}
		#wrapper-content{
			background:#fff;
			height:30px;
		}
.flexslider{
	/*width:100%;*/
	top:-10px;
	border:none;
}
.img-banner{ height:400px;}
	</style>
<div id="box-wrapper">
<div id="wrapper">
	<div id="wrapper-header">
			<div class="flexslider">
			  <ul class="slides">
              <?php
include 'koneksi.php';
$query=mysql_query("select*from banner order by nm_banner");
while($row=mysql_fetch_array($query)){
?>
					<li>
			<img src="asset/images/<?php echo $row['gambar_banner'] ;?>" class="img-banner" />

				   </li>

       <?php } ?>
				</ul>
			</div>
	</div>
	

</div>
</div>