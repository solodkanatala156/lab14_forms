<?php

// Підключення Composer
require __DIR__ . '/../vendor/autoload.php';

// Підключення бібліотеки Respect/Validation
use Respect\Validation\Validator as v;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Отримання даних із форми
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Масив для помилок
    $errors = [];

    // Перевірка імені через бібліотеку
    if (!v::stringType()->notEmpty()->validate($name)) {
        $errors[] = "Поле 'Ім'я' не може бути порожнім.";
    }

    // Перевірка email через бібліотеку
    if (!v::email()->validate($email)) {
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
