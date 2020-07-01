<?php include __DIR__ . '/../header.php'; ?>
    <div style="text-align: center;">
        <h1>Введите данные абонента</h1>
        <?php $urlArray = explode("/", $_SERVER['QUERY_STRING']);
            $url = $urlArray[2]; ?>
        <?php var_dump($url) ?>
        <?php if (!empty($error)): ?>
            <div style="background-color: red;padding: 5px;margin: 15px"><?= $error ?></div>
        <?php endif; ?>
        <form action="/checkvoid/form/<?php echo $url; ?>/create/" method="post">
            <label>Маска <input type="text" name="mask" value="<?= $_POST['mask'] ?? '' ?>"</label>
            <br><br>
            <label>Адрес <input type="text" name="fact_address" value="<?= $_POST['fact_address'] ?? '' ?>"></label>
            <br><br>
            <label>Имя <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>"></label>
            <br><br>
            <label>Айпи <input type="text" name="ip" value="<?= $_POST['ip'] ?? '' ?>"></label>
            <br><br>
            <label>Порт <input type="text" name="port" value="<?= $_POST['port'] ?? '' ?>"></label>
            <br><br>
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>
    <form action="/admin/">
        <h3>Вернуться к поиску</h3>
        <input type="submit" value="Вернуться">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>