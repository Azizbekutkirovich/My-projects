<?php
  use yii\helpers\Url;
  use yii\helpers\Html;
  use yii\bootstrap5\ActiveForm;
?>
<div class="form_wrapper">
    <div class="form_container" id="title">
      <div class="title_container">
        <h2><span style="color: red;">Quiz teacher</span> platformasiga kirish</h2>
      </div>
      <?php $f = ActiveForm::begin(); ?>
        <div class="row clearfix">
          <div class="col_half">
            <label>Login</label>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
              <?=$f->field($model, 'login')->textInput(['placeholder' => "Loginni kiriting"])->label(false);?>
              <!-- <input type="text" name="login" id="login_u" placeholder="Loginni kiriting" required/> -->
            </div>
          </div>
          <div class="col_half">
            <label>Parol</label>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
              <?=$f->field($model, 'password')->textInput(['placeholder' => "Parolni kiriting"])->label(false);?>
              <!-- <input type="text" name="password" id="password" placeholder="Parolni kiriting" required /> -->
            </div>
          </div>
        </div>
        <!-- <input class="button" id="login" type="submit" value="Kirish" /> -->
        <?php
          echo Html::submitButton("Kirish", ['class' => 'rg', 'style' => 'background-color: orange; width: 100%;']);
        ?>
        <h3>Agar ro'yhatdan o'tmagan bo'lsangiz quyidagi ro'yhatdan o'tish linkiga bosing! <a href="<?=Url::to(['main/register'])?>" style="margin-top: 20px; width: 100%;"/>Ro'yhatdan o'tish</a></h3>
      <?php ActiveForm::end(); ?>
    </div>
  </div>