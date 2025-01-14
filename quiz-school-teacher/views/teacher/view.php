<?php
	use yii\helpers\Url;
	use app\models\Users;
?>
<div class="container">
	<h3 style="text-align: center;"><?=$test_name?> bo'yicha o'quvchilar natijalari</h3>
	<?php if (!empty($users_info)): ?>
	<div class="row">
		<table>
			<thead>
				<tr>
			    <th>Ism va Familya</th>
			    <th>Sinf</th>
			    <th>To'g'rilari</th>
			    <th>Noto'g'rilari</th>
			    <th>Qo'shimcha</th>
				</tr>
			</thead>
	<?php for ($i = count($users_info) - 1; $i >= 0; $i--): ?>
		<?php
			$users = Users::findOne(['id' => $users_info[$i]['user_id']]);
		?>
			<tbody>
		    <tr>
		      <td><?=$users->surname?> <?=$users->name?></td>
		      <td class="cl"><?=$users->class?></td>
		      <?php if ($users_info[$i]['correct'] != '0'): ?>
		      <td><?=$users_info[$i]['correct']?></td>
		      <?php else: ?>
		      	<td>To'g'rilar yo'q</td>
		      <?php endif; ?>
		      <?php if ($users_info[$i]['wrong'] != '0'): ?>
		      <td><?=$users_info[$i]['wrong']?></td>
		      <?php else: ?>
		      	<td>Xatolar yo'q</td>
		      <?php endif; ?>
		      <td><a class="btn btn-info" href="<?=Url::to(['teacher/detail', 'id' => $users_info[$i]['id']])?>">Batafsil</a></td>
		    </tr>
			</tbody>
	<?php endfor; ?>
		</table>
	</div>
<?php else: ?>
	<h3>Bu testingizni hali hech kim ishlamagan!</h3>
<?php endif; ?>
<style type="text/css">
  table {
  width: 100%;
  border-top: 1px solid #ccc;
  border-left: 1px solid #ccc;
  border-collapse: collapse;
  margin-bottom: 1em;
}
table th, table td {
  padding: 0.5em 1em;
  border-bottom: 1px solid #ccc;
  border-right: 1px solid #ccc;
  white-space: pre;
}
table thead th, table tbody td {
  text-align: center;
}
table thead {
  color: white;
  background: #0cf;
}
table thead th {
  padding: 1em;
}
table[data-comparing="active"] tbody th {
  border-bottom: none;
  font-size: 0.75em;
  color: #767676;
  padding-bottom: 0;
}

</style>
</div>