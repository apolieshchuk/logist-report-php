<div class="top-menu">
  <form>
    <input type="button" id="copy-button" value="Копіювати">
    <input type="button" value="Додати авто">
    <input type="button" value="На маршрут!">
    <input type="button" value="Звіт">
  </form>
</div>
<table class="main-table">
    <thead>
    <tr class = "main-table-filter">
      <th></th>
      <th></th>
      <th><input type="text"></th>
      <th><input type="text"></th>
      <th><input type="text"></th>
      <th><input type="text"></th>
      <th><input type="text"></th>
      <th><input type="text"></th>
      <th><input type="text"></th>
      <th><input type="text"></th>
      <th><input type="text"></th>
    </tr>
    <tr class = "main-table-head">
      <th></th>
      <th>#</th>
      <th>Перевізник</th>
      <th>Марка</th>
      <th>№авт</th>
      <th>№прич</th>
      <th>Прізвище</th>
      <th>Імя</th>
      <th>По-батьк</th>
      <th>Тел</th>
      <th>Замітки</th>
    </tr>
    </thead>
    <tbody>
    <?php
      $counter = 0;
      while($auto = $autoResult->fetch_assoc()):
        ++$counter?>
        <tr id="<?= 'row-'.$counter?>">
          <td><input type="checkbox" id="<?= 'auto-'.$auto['id']?>"></td>
          <td><?= $counter ?></td>
          <td class="name"><?= $auto['name']?></td>
          <td class="mark"><?= $auto['mark']?></td>
          <td class="auto_num"><?= $auto['auto_num']?></td>
          <td class="trail_num"><?= $auto['trail_num']?></td>
          <td class="dr_surn"><?= $auto['dr_surn']?></td>
          <td class="dr_name"><?= $auto['dr_name']?></td>
          <td class="dr_fath"><?= $auto['dr_fath']?></td>
          <td class="tel"><?= $auto['tel']?></td>
          <td class="notes"><?= $auto['notes']?></td>
        </tr>
      <?php endwhile;?>
    </tbody>

  </table>





