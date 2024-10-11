<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
    <title>Выбор типа печенья</title>
</head>
<body>

<h1>Доступные типы печенья:</h1>
<ul>
    <li>Шоколадное</li>
    <li>Ванильное</li>
    <li>Овсяное</li>
    <li>Фруктовое</li>
    <li>Ореховое</li>
</ul>

<h1>Заказ печенья</h1>

<form action="" method="POST">
    <label for="cookieType">Введите тип печенья:</label>
    <input type="text" name="cookieType" id="cookieType" required>
    <input type="submit" value="Проверить" class="b">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cookieType = $_POST['cookieType'];

    try {
        
        $cookie = new Cookie();
        
        $cookie->setType($cookieType);
        
        echo "<p>Вы заказали печенье типа :  " . htmlspecialchars($cookie->getType()) .  "</p>";
    } catch (Exception $e) {
      
        echo "<p style='color:red;'>" . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

<?php
class Cookie {

    private $type;
    

    private $availableTypes = [
        'Шоколадное',
        'Ванильное',
        'Овсяное',
        'Фруктовое',
        'Ореховое'
    ];

    public function setType($type) {
        if (in_array($type, $this->availableTypes)) {
            $this->type = $type;
        } else {
            throw new Exception("Такого типа печенья нет в наличии: $type");
        }
    }

    public function getType() {
        return $this->type;
    }

   
    public function getAvailableTypes() {
        return $this->availableTypes;
    }
}
?>

</body>
</html>