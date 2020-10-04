<?php include __DIR__ . '/../header.php'; ?>
<div class="wrapper">
  <?php foreach ($voids as $void): ?>
  <div class="form">
    <form>
        <?php $request = $void['id'] ?>
        <button formaction="/MikrotikAdminPanel/checkvoid/form/<?php echo $void['id'] ?>/">Создать </button>
        <?php echo 'id строки ' . $void['id'] . "<br>" ?>
        <?php echo 'диапазон ip адрессов ' . $void['address'] . "<br><hr>" ?>
    </form>
  </div>
  <?php endforeach; ?>
</div>
<?php include __DIR__ . '/../footer.php'; ?>