<?php include __DIR__ . '/../header.php'; ?>
<div class="wrapper">
  <div class="wrap">
    <div class="checkvoid__cell-1">
      <?php foreach ($voids as $void): ?>
      <div class="checkvoid__form">
        <form>
            <?php $request = $void['id'] ?>
          <p class="checkvoid__text">ID: <?= $void['id'] ?></p>
          <p class="checkvoid__text">Диапозон IP адресов: <?= $void['address'] ?></p>
          <div class="admin__button checkvoid__button">
            <a href="/MikrotikAdminPanel/checkvoid/form/<?= $void['id'] ?>/">
              <div class="admin__button-text">
                <p>Создать</p>
              </div>
            </a>
          </div>
        </form>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="checkvoid__cell-2">
      <div class="admin__button checkvoid__button-back">
        <a href="http://localhost/MikrotikAdminPanel/">
          <div class="admin__button-text">
            <p>Вернуться</p>
          </div>
        </a>
      </div>
  </div>
</div>
<?php include __DIR__ . '/../footer.php'; ?>