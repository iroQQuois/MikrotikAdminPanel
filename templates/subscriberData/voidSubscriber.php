<?php include __DIR__ . '/../header.php'; ?>
Пустые поля: <br><br>
<?php foreach ($voids as $void): ?>
    <?php echo 'id строки ' . $void['id'] . "<br>" ?>
    <?php echo 'диапазон ip адрессов ' . $void['address'] . "<br><hr>" ?>
<?php endforeach; ?>

<form action="/create/<?php echo $_POST['create'] ?>/" method="post">
    Создать абонента <br>
    <label>ID строки<input type="text" name="create"></label>
    <input type="submit" value="Создать">
</form>
<?php include __DIR__ . '/../footer.php'; ?>