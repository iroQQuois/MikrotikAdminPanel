<?php include __DIR__ . '/../header.php'; ?>
<div style="text-align: center;">
    <h1>Поиск абонента</h1>
    <form class="example" action="/admin/search/" method="post">
        <label><input type="text" name="name">Введи имя абонента</label>
        <button type="submit" value="Найти">Найти</button>
        <?php $request = $_POST['name']; ?>
    </form>
</div>

<?php foreach ($subscriberTraffic as $traffic): ?>
    <?php echo "<br><br>".'TX:' . $traffic['tx'] ?>
    <?php echo "<br><br>".'RX:' . $traffic['rx'] ?>
    <?php echo  "<br><br>".'tx-packets:' . $traffic['tx-packets'] ?>
    <?php echo  "<br><br>".'rx-packets:' . $traffic['rx-packets']."<hr>" ?>
<?php endforeach; ?>


<form class="example" action="/admin/">
    <button type="submit" value="Вернуться к поиску">Вернуться к поиску</button>
</form>

<?php include __DIR__ . '/../footer.php'; ?>