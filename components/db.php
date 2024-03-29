<?php
  $servername = "91.239.232.46";
  $username = "aipx";
  $password = "Fleepaipx1203";
  $db = "aipx_logrep";

  // Create connection
  $conn = new mysqli($servername, $username, $password,$db);
  $conn->set_charset("utf8");

  // О нет!! переменная connect_errno существует, а это значит, что соединение не было успешным!
  if ($conn->connect_errno) {
    // Соединение не удалось. Что нужно делать в этом случае?
    // Можно отправить письмо администратору, отразить ошибку в журнале,
    // информировать пользователя об ошибке на экране и т.п.
    // Вам не нужно при этом раскрывать конфиденциальную информацию, поэтому
    // просто попробуем так:
    echo "Извините, возникла проблема на сайте";

    // На реальном сайте этого делать не следует, но в качестве примера мы покажем
    // как распечатывать информацию о подробностях возникшей ошибки MySQL
    echo "Ошибка: Не удалась создать соединение с базой MySQL и вот почему: \n";
    echo "Номер ошибки: " . $conn->connect_errno . "\n";
    echo "Ошибка: " . $conn->connect_error . "\n";
    // Вы можете захотеть показать что-то еще, но мы просто выйдем
    exit;
  }

  // Выполняем SQL-запрос
  $sql = 'SELECT * FROM auto ORDER BY name ASC';
  $autoResult = $conn->query($sql);
  if (!$autoResult) {
    // О нет! запрос не удался.
    echo "Извините, возникла проблема в работе сайта.";

    // И снова: не делайте этого на реальном сайте, но в этом примере мы покажем,
    // как получить информацию об ошибке:
    echo "Ошибка: Наш запрос не удался и вот почему: \n";
    echo "Запрос: " . $sql . "\n";
    echo "Номер ошибки: " . $conn->errno . "\n";
    echo "Ошибка: " . $conn->error . "\n";
    exit;
  }

  // Уфф, мы это сделали. У нас есть соединение с базой данных и успешный запрос.
  // Но где же его результат?
  if ($autoResult->num_rows === 0) {
    // Упс! в запросе нет ни одной строки! Иногда это ожидаемо и нормально, иногда нет.
    // Решать вам. В данном случае, может быть actor_id был слишком большим?
    echo "Мы не смогли найти совпадение, простите. Пожалуйста, попробуйте еще раз.";
    exit;
  }

  // Скрипт автоматически закрывает соединение MySQL и освобождает память, тем не
  // менее давайте сделаем это вручную
//  $result->free();
//  $conn->close();
  ?>
