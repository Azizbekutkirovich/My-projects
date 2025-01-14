<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap5\ActiveForm;
?>
<div class="container">
	<div class="row" style="margin-top: 100px;">
		<?php $f = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
			<?= $f->field($model, 'test_name')->textInput(['placeholder' => "Test nomini kiriting"])->label(false); ?>
		   <div class="col_half">
            <labeL>Testingiz qaysi sinf uchun?</label>
            <div class="input_field">
              <?=$f->field($model, 'class')->dropDownList([
                '1' => '1-sinf',
                '2' => '2-sinf',
                '3' => '3-sinf',
                '4' => '4-sinf',
                '5' => '5-sinf',
                '6' => '6-sinf',
                '7' => '7-sinf',
                '8' => '8-sinf',
                '9' => '9-sinf',
                '10' => '10-sinf',
                '11' => '11-sinf',
              ],['prompt'=>'Tanlang'])->label(false);?>
            </div>
            <p id="text_c"></p>
          </div>
			<label>Testni yuklang</label>
			<?= $f->field($model, 'file')->fileInput()->label(false);?>
			<?= $f->field($model, 'time')->input('number',  ['min' => 1, 'step' => 1, 'placeholder' => 'Minut']) ?>
			<?php
				echo Html::submitButton("Yuborish", ['class' => 'btn btn-info']);
		?>
		<?php ActiveForm::end(); ?>
	</div>
</div>