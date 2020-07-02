<?php include __DIR__ . '/../header.php'; ?>
    <div style="text-align: center;">
        <h1>Поиск абонента</h1>
        <?php if (!empty($error)): ?>
            <div style="background-color: #DC5B21;padding: 5px;margin: 15px"><?= $error ?></div>
        <?php endif; ?>
        <form class="example" action="/admin/search/" method="post">
            <label><input type="text" name="name"></label><br>
            <button type="submit" value="Найти">Найти</button>
            <?php $request = $_POST['name']; ?>
        </form>
    </div>

<?php if ($subscriber['id'] != null): ?>
    <?php echo "<br><br>".'Айди пользователя: ' . $subscriber['id'];
     echo "<br><br>".'Диапозон айпи адресов пользователя: ' .$subscriber['address'];
     echo  "<br><br>".'Маска пользователя: ' . $subscriber['mask'];
     echo  "<br><br>".'Адрес пользователя: ' . $subscriber['fact_address'] ;
     echo  "<br><br>".'Имя пользователя пользователя: ' . $subscriber['name'] ;
     echo  "<br><br>".'Айпи адрес пользователя: ' . $subscriber['ip'];
     echo  "<br><br>".'Порт пользователя: ' . $subscriber['port']; ?>
    <p><a href="/admin/search/torch/<?php echo $request; ?>/">Проверить трафик этого пользователя</a></p>
    <p><a href="/admin/search/drop/<?php echo $request; ?>/">Удалить этого абонента</a></p>
<?php else: ?>
<br><br>пустая строка или такого абонента нет

<?php endif; ?>


<?php include __DIR__ . '/../footer.php'; ?>