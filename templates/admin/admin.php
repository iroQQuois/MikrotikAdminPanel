<?php include __DIR__ . '/../header.php'; ?>
    <div style="text-align: center;">
        <h1>Поиск абонента</h1>
        <?php if (!empty($error)): ?>
            <div style="background-color: red;padding: 5px;margin: 15px"><?= $error ?></div>
        <?php endif; ?>
        <form class="example" style="margin:auto;max-width:300px" action="/admin/search/" method="post">
            <label><input type="text" placeholder="Поиск.." name="name"></label>
            <button type="submit" value="Найти">Найти</button>
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>