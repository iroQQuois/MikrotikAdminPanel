<?php include __DIR__ . '/../header.php'; ?>
    <div class="wrapper">
      <div class="wrap">
        <div class="search__cell-1">
          <div class="search__form">
            <div class="title">
              <h1>Поиск абонента</h1>
              <?php if (!empty($error)): ?>
                <p class="error"><?= $error ?></p>
              <?php endif; ?>
            </div>
            <div id="app">
              <div class="form">
                <form action="/MikrotikAdminPanel/admin/search/" method="post">
                  <input type="text" id="txt" placeholder="" name="name" v-model="txt">
                  <button id="btn" :class="status"></button>
                    <?php $request = $_POST['name']; ?>
                </form>
              </div>
            </div>
            <div class="admin__button search__button-1">
              <a href="torch/<?= $subscriber['id'] ?>">
                <div class="admin__button-text">
                  <p>Проверить трафик</p>
                </div>
              </a>
            </div>
            <div class="admin__button search__button-2">
              <a href="drop/<?= $subscriber['id'] ?>">
                <div class="admin__button-text">
                  <p>Удалить абонента</p>
                </div>
              </a>
            </div>
            <div class="admin__button search__button-1">
              <a href="http://localhost/MikrotikAdminPanel/">
                <div class="admin__button-text">
                  <p>Вернуться</p>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="search__cell-2">
          <?php if ($subscriber['id'] != null): ?>
            <div class="title" style="padding-bottom: 30px">
              <h2><?= $subscriber['name'] ?></h2>
            </div>
            <p class="search__info">ID: <?= $subscriber['id'] ?></p>
            <p class="search__info">Диапозон IP адресов: <?= $subscriber['address'] ?></p>
            <p class="search__info">Маска: <?= $subscriber['mask'] ?></p>
            <p class="search__info">Адрес: <?= $subscriber['fact_address'] ?></p>
            <p class="search__info">IP: <?= $subscriber['ip'] ?></p>
            <p class="search__info">Порт: <?= $subscriber['port'] ?></p>
              <?php
//               echo "<br><br>".'Диапозон айпи адресов пользователя: ' .$subscriber['address'];
//               echo  "<br><br>".'Маска пользователя: ' . $subscriber['mask'];
//               echo  "<br><br>".'Адрес пользователя: ' . $subscriber['fact_address'] ;
//               echo  "<br><br>".'Имя пользователя пользователя: ' . $subscriber['name'] ;
//               echo  "<br><br>".'Айпи адрес пользователя: ' . $subscriber['ip'];
//               echo  "<br><br>".'Порт пользователя: ' . $subscriber['port']; ?>
          <?php else: ?>
          <br><br>пустая строка или такого абонента нет
          <?php endif; ?>
        </div>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>