<?php include __DIR__ . '/../header.php'; ?>
    <div style="text-align: center;">
        <h1>Поиск абонента</h1>
        <form action="/admin/search/" method="post">
            <label>Имя абонента <input type="text" name="name"></label>
            <input type="submit" value="Найти">
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>