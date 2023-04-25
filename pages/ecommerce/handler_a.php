<?php

// Подключаем файл конфигурации
include "../../vendor/db.php";
$connectionDB = $connect;

// Получаем значение переменной "search" из файла "script.js".
if (isset($_POST['search'])) {

    // Помещаем поисковой запрос в переменной
    $Name = $_POST['search'];

    // Запрос для выбора из базы данных
    $Query = "SELECT * FROM products WHERE name LIKE '%$Name%' LIMIT 5";

    //Производим поиск в базе данных
    $ExecQuery = mysqli_query($connectionDB, $Query);

    // Создаем список для отображения результатов
    echo '<ul>';

    //Перебираем результаты из базы данных
    while ($Result = mysqli_fetch_array($ExecQuery)) {
?>
        <!-- Создаем элементы списка. При клике на результат вызываем функцию обработчика fill() из файла "script.js". В параметре передаем найденное имя-->

        <!-- <table class="text-nowrap table-bordered dh-table">

            <tbody>
            <thead>
                <tr><th>ID</th><th>Название</th><th>Категория</th><th>Количество</th><th>Цена</th><th>Мод</th></tr>
            </thead>
            

                
                <tr>
                    <td><?php echo $Result['id']; ?></td>
                    <td><?php echo $Result['name']; ?></td>
                    <td><?php echo $Result['cat']; ?></td>
                    <td><?php echo $Result['sum']; ?></td>
                    <td><?php echo $Result['price']; ?></td>
                    <td><a href="edit_prod.php?id=<?php echo $Result['id']; ?>" class="details-btn">Редактировать <i class="icofont-arrow-right"></i></a></td>
                </tr>

                 </tbody></table> -->
                 <tr>
                    <td><?php echo $Result['name']; ?></td>
                    <td><?php echo $Result['cat']; ?></td>
                    <td><?php echo $Result['sum']; ?></td>
                    <td><?php echo $Result['price']; ?></td>
                    <td><a href="edit_prod_a.php?id=<?php echo $Result['id']; ?>" class="details-btn">Редактировать <i class="icofont-arrow-right"></i></a></td>
                </tr>


            
        

        

<?php
    }
}
?>
    </ul>