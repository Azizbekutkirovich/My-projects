<?php
  use yii\helpers\Url;
?>
<div class="container">
  <?php if (!empty($empty_nomericon_error)): ?>
    <h3>Siz yuklagan testda mana bu <span style="color: red;">№</span> belgi topilmadi! Iltimos belgini tegishli joyga yozib testni qayta yuklang!</h3>
  <?php endif; ?>
  <?php if (!empty($question_number_true)): ?>
    <?php if (!empty($question_number_error)): ?>
        <h3>Siz yuklagan testda <span style="color: blue"><?=$question_number_true?></span>-savol topilmadi! Savolga raqam berayotganda <span style="color: blue"><?=$question_number_true?></span>ni o'rniga <span style="color: blue"><?=$question_number_error?></span> yozilgan. Iltimos xatoni to'g'irlab testni qayta yuklang!</h3>
    <?php else: ?>
        <h3>Siz yuklagan testda <span style="color: blue"><?=$question_number_true?></span>-savol topilmadi! Savolga umuman raqam bermagansiz. Iltimos xatoni to'g'irlab testni qayta yuklang!</h3>
    <?php endif; ?>
  <?php endif; ?>
  <?php if (!empty($ans_number_error)): ?>
    <?php
        $ans_error = empty($ans_error) ? 'belgilanmagan' : $ans_error;
    ?>
    <h3>Siz yuklagan testda <span style="color: blue"><?=$ans_number_error?></span>-savolni javobi <span style="color: red"><?=$ans_error?></span>! Bu qoidalarga to'g'ri kelmaydi! Javob A, B, C, D, kabi katta lotin harflari bilan yozilishi kerak. Iltimos xatolikni to'g'irlab testni qayta yuklang!</h3>
  <?php endif; ?>
  <p>Agar xatoni to'g'irlay olmayotgan bo'lsangiz qoidalar tugmasiga bosing va qoidalar bilan tanishib chiqing</p>
  <a class="btn btn-danger" href="<?=Url::to(['test/howupload'])?>">Qoidalar</a>
  <a class="btn btn-info" href="<?=Url::to(['test/upload'])?>">Testni qayta yuklash</a>
</div>