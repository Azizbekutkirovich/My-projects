<?php
	use yii\helpers\Url;
	use app\models\Teachers;
?>
<div class="container">
	<?php if (!empty($info)): ?>
		<div class="row">
		<?php for ($i = count($info) - 1; $i >= 0; $i--): ?>
			<div class="four col-md-6" id="matem" style="margin-top: 30px;">
		        <div class="counter-box" style="background-color: green; border-radius: 20px;">
		          	<i class="fa-solid fa-calculator"></i>
		          	<p style="color: white;">Ushbu testni <span style="color: red;"><?=$info[$i]['date']?></span> da yuklagansiz</p>
		        	<h3 style="color: white; display: block;"><?=$info[$i]['test_name']?></h3>
		        	<!-- <br><br>
		        	<div> -->
		        		<a href="<?=Url::to(['teacher/info', 'id' => $info[$i]["id"]])?>" class="btn btn-danger">Testni tekshirish</a>
		        	<!-- </div> -->
		        </div>
		    </div>
      	<?php endfor; ?>
      	</div>
	<?php else: ?>
		<h3>Siz bironta test yuklamagansiz</h3>
	<?php endif; ?>
</div>