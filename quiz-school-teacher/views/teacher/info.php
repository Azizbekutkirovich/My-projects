<?php
	use yii\helpers\Url;
	use app\excel\SimpleXLSX;
	$src = "./../../quiz-school/web/tests/".$info->name;
	// echo $src;
	// die;
	$excel = SimpleXLSX::parse($src);
	$rows = $excel->rows();
	for ($i = 0; $i < count($rows); $i++) {
		if ($rows[$i][0] == 'T/r' || $rows[$i][0] == '№') {
			$start = $i + 1;
		} else if ($rows[$i][1] == 'Savollar' || $rows[$i][1] == 'Savol') {
			$start = $i + 1;
		}
	}
?>	
<div class="container">
	<div class="alert alert-secondary" style="text-align: center;">
		<h4 style="display: inline;"><?=$info->test_name?></h4>
	</div>
	<div id="content">
		<div id="info_test">
			<div class="row" id="test_circle">
				<?php for($i = $start; $i < count($rows); $i++): ?>
				<div class="test rounded-circle" id="<?=$rows[$i][0]?>" type="submit" style="text-align: center;">
					<p style="margin-top: 1vw;"><?=$rows[$i][0]?></p>
				</div>
				<?php endfor; ?>
			</div><br>
			<?php for ($i = $start; $i < count($rows); $i++): ?>
			<div class="row" id="test_form">
				<div>
					<p style="font-size: 20px;"><?=$rows[$i][0]?>. <?=$rows[$i][1]?></p>
					<div class="alert alert-dark" id="a" style="width: 400px;">
						A) <?=$rows[$i][3]?></label>
					</div>
					<div class="alert alert-dark" id="b">
						B) <?=$rows[$i][4]?></label>
					</div>
					<div class="alert alert-dark" id="c">
						C) <?=$rows[$i][5]?></label>
					</div>
					<div class="alert alert-dark" id="d">
						D) <?=$rows[$i][6]?></label>
					</div>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</div>
<br>
<style type="text/css">
	.test {
	  width: 50px;
	  height: 50px;
	  box-shadow: inset 0 0 5px #000000, 0 0 5px #000000;
	  display: inline;
	}
	.activ {
		background-color: orange;
	}
	.selected {
		background-color: blue;
	}
</style>