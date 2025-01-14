<?php
  use yii\helpers\Url;
?>
  <div class="container" id="content1">
    <h3 style="text-align: center; margin-top: 10vw;">Xush kelibsiz <span style="color: red;"><?=Yii::$app->user->identity->surname?> <?=Yii::$app->user->identity->name?></span></h3>
      <div class="row">
      <div class="four col-md-6" id="start" type="submit" style="margin-top: 30px;">
        <a class="counter-box" href="<?=Url::to(['test/upload'])?>" style="background-color: #E8E8E8; border-radius: 20px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
<path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg>
          <p style="font-size: 20px;">TEST YUKLASH</p>
        </a>
      </div>
      <div class="four col-md-6" id="cash" type="submit" style="margin-top: 30px;">
        <a class="counter-box" href="<?=Url::to(['teacher/select'])?>" style="background-color: #E8E8E8; border-radius: 20px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
<path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
</svg>
          <p style="font-size: 20px;">YUKLANGAN TESTLAR</p>
        </a>
      </div><br>
      <div class="four col-md-6" id="cash" type="submit" style="margin-top: 30px;">
        <a class="counter-box" href="<?=Url::to(['teacher/selectview'])?>" style="background-color: #E8E8E8; border-radius: 20px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
</svg>
          <p style="font-size: 20px;">O'QUVCHILAR BAJARGAN TESTLAR</p>
        </a>
      </div><br>
      </div>
    </div>