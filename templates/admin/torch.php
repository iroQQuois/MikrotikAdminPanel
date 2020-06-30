<?php include __DIR__ . '/../header.php'; ?>
<div style="text-align: center;">
    <h1>Поиск абонента</h1>
    <form action="/admin/search/" method="post">
        <label>Имя абонента <input type="text" name="name"></label>
        <input type="submit" value="Найти">
        <?php $request = $_POST['name']; ?>
    </form>
</div>

<?php foreach ($subscriberTraffic as $traffic): ?>
    <?php echo "<br><br>".'TX:' . $traffic['tx'] ?>
    <?php echo "<br><br>".'RX:' . $traffic['rx'] ?>
    <?php echo  "<br><br>".'tx-packets:' . $traffic['tx-packets'] ?>
    <?php echo  "<br><br>".'rx-packets:' . $traffic['rx-packets']."<hr>" ?>
<?php endforeach; ?>


<form action="/admin/">
    <input type="submit" value="Вернуться к поиску">
</form>

<?php include __DIR__ . '/../footer.php'; ?>