<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap5\ActiveForm;
?>
<div class="form_wrapper">
    <div class="form_container" id="title">
      <div class="title_container">
        <h2><span style="color: red;">Quiz teacher</span> platformasiga ro'yhatdan o'tish</h2>
      </div>
      <?php $f = ActiveForm::begin(); ?>
        <div class="row clearfix">
          <div class="col_half">
            <label>Login</label>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
              <!-- <input type="text" name="login" id="login" placeholder="Login o'ylab toping" required/> -->
              <?=$f->field($model, 'login')->textInput(['placeholder' => "Login o'ylab toping"])->label(false);?>
            </div>
          </div>
          <div class="col_half">
            <label>Ism</label>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
              <?=$f->field($model, 'name')->textInput(['placeholder' => "Ismingizni kiriting"])->label(false);?>
            </div>
            <p id="text_n"></p>
          </div>
          <div class="col_half">
            <label>Familiya</label>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
              <?=$f->field($model, 'surname')->textInput(['placeholder' => "Familyangizni kiriting"])->label(false);?>
            </div>
            <p id="text_s"></p>
          </div>
          <div class="col_half">
            <label>Telefon</label>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
              <!-- <input type="text" name="login" id="login" placeholder="Login o'ylab toping" required/> -->
              <?=$f->field($model, 'phone')->textInput(['placeholder' => "Telefon raqamni kiriting"])->label(false);?>
            </div>
          </div>
          <div class="col_half">
            <label>Maktabni tanlang</label>
            <div class="input_field">
              <?=$f->field($model, 'school')->dropDownList([
                '1' => '1-maktab',
                '2' => '2-maktab',
                '3' => '3-maktab',
                '4' => '4-maktab',
                '8' => '8-maktab',
                '10' => '10-maktab',
                '11' => '11-maktab',
                '12' => '12-maktab',
                '13' => '13-maktab'
              ],['prompt'=>'Tanlang'])->label(false);?>
            </div>
            <p id="text_sch"></p>
          </div>
          <div class="col_half">
            <label>Dars beradigan fanni tanlang</label>
            <div class="input_field">
              <?=$f->field($model, 'job')->dropDownList([
                'matematika' => 'Matematika',
                'fizika' => 'Fizika',
                'ona tili' => 'Ona tili',
                'adabiyot' => 'Adabiyot',
                'rus tili' => 'Rus tili',
                'ingliz tili' => 'Ingliz tili',
                "o'zbekiston tarixi" => "O'zbekiston tarixi",
                'jahon tarixi' => 'Jahon tarixi',
                'informatika' => 'Informatika',
                'geografiya' => 'Geografiya',
                'kimyo' => 'Kimyo',
                'iqtisodiyot' => 'Iqtisodiyot',
                'biologiya' => 'Biologiya',
                'chizmachilik' => 'Chizmachilik',
                'tarbiya' => 'Tarbiya'
              ],['prompt'=>'Tanlang'])->label(false);?>
            </div>
            <p id="text_sch"></p>
          </div>
          <div class="col_half">
            <label>Parol</label>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
              <?=$f->field($model, 'password')->textInput(['placeholder' => "Parol o'ylab toping"])->label(false);?>
            </div>
            <p id="text_pa" style="color: blue;">Parol kamida 4ta belgidan iborat bo'lishi kerak</p>
          </div>
          <div class="col_half">
          	<label>Maxfiy parolni kiriting</label>
            <?=$f->field($model, 'secret')->textInput()->label(false);?>
          </div>
        </div>
        <?php
          echo Html::submitButton("Kirish", ['class' => 'rg', 'style' => 'background-color: orange; width: 100%;']);
        ?>
        <h3>Agar ro'yhatdan o'tgan bo'lsangiz quyidagi login linkiga bosing! <a href="<?=Url::to(['main/login'])?>" style="margin-top: 20px; width: 100%;">Login</a></h3>
      <?php ActiveForm::end(); ?>
  </div>
</div>