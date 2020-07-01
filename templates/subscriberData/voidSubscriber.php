<?php include __DIR__ . '/../header.php'; ?>
Пустые поля: <br><br>
<?php foreach ($voids as $void): ?>
<form>
    <?php $request = $void['id'] ?>
    <button formaction="/checkvoid/form/<?php echo $void['id'] ?>/">Создать </button>
    <?php echo 'id строки ' . $void['id'] . "<br>" ?>
    <?php echo 'диапазон ip адрессов ' . $void['address'] . "<br><hr>" ?>
</form>
<?php endforeach; ?>


<?php include __DIR__ . '/../footer.php'; ?>