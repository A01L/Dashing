<?php 
include("vendor/db.php");
function get_data_db($db, $table, $data, $index, $index2){
		$querry = mysqli_query($db, "SELECT * FROM `$table` WHERE `$index` = '$index2'");
		$datas = mysqli_fetch_assoc($querry);
   	    return $datas["$data"];
	}
header("Content-type: text/html; charset=utf8");

if(isset($_GET['num'])){
	$num = $_GET['num'];
	$result = mysqli_query($db, "SELECT * FROM depop ORDER BY `id` DESC LIMIT $num, 5"); 
	
	if(mysqli_num_rows($result) > 0){	
		$comment = mysqli_fetch_array($result);	
		
		do{
			?>

		<div class="single-row border-bottom pt-3 pb-3">
		<div class="d-flex justify-content-between align-items-center">
			<div class="d-flex position-relative">
				<!-- <label class="custom-checkbox">
					<input type="checkbox" checked="checked">
					<span class="checkmark"></span>
				</label> -->
				<div class="todo-text">
					<p class="card-text mb-1"><?php echo $comment['comment']; ?></p>
					<?php 
						if ($comment['type'] == "plus") {
							$sty = "color: #50C878;";
							$sums = "+";
						}
						else {
							$sty = "color: orange;";
							$sums = "-";
						}

						$pide = (int)$comment['personal'];
					 ?>
					<p class="font-12 mb-0" style="<?php echo $sty; ?>"><?php echo $comment['title']; ?> | <?php echo $comment['date']; ?> | <?php echo get_data_db($connect, "personals", "email", "id", $pide);?> </p>
				</div>
			</div>
			<div class="d-flex">
				<h3 style="margin-right: 20px;"><?php echo $sums; ?><?php echo $comment['sum']; ?></h3>
			<div class="assign_to">
				
			</div>
			<div class="dropdown-button">
				<a href="#" class="d-flex align-items-center" data-toggle="dropdown">
					<div class="menu-icon style--two w-14 mr-0">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="#">Daily</a>
				<a href="#">Sort By</a>
				<a href="#">Monthly</a>
			</div>
		</div>
	</div>
			</div>
</div>
	<?php	
		}while($comment = mysqli_fetch_array($result));
		
		sleep(1); 
	}else{
		echo 0;
	}
	
}

?>