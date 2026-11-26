<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Отримання даних із форми
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Масив для помилок
    $errors = [];

    // Перевірка імені
    if (trim($name) === '') {
        $errors[] = "Поле 'Ім'я' не може бути порожнім.";
    }

    // Перевірка email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введіть коректний email.";
    }

    // Виведення результатів
    if (!empty($errors)) {

        echo "<h3>Виникли помилки:</h3>";
        echo "<ul>";

        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err, ENT_QUOTES, 'UTF-8') . "</li>";
        }

        echo "</ul>";

        echo '<a href="../public/form.html">Назад до форми</a>';

    } else {

        echo "<h2>Дякуємо!</h2>";

        echo "Ваше ім'я: <b>" .
            htmlspecialchars($name, ENT_QUOTES, 'UTF-8') .
            "</b><br>";

        echo "Ваш email: <b>" .
            htmlspecialchars($email, ENT_QUOTES, 'UTF-8') .
            "</b><br>";

        echo '<a href="../public/form.html">Повернутися до форми</a>';
    }

} else {

    echo 'Будь ласка, відкрийте <a href="../public/form.html">форму</a>.';

}

?>
