<?php include __DIR__ . '/../header.php'; ?>
  <div class="wrapper" xmlns:v-bind="http://www.w3.org/1999/xhtml">
        <?php if (!empty($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
      <div class="admin__form">
        <div class="title">
          <h1>Поиск абонента</h1>
        </div>
        <div id="app">
          <div class="form">
            <form action="/MikrotikAdminPanel/admin/search/" method="post">
              <input type="text" id="txt" placeholder="" name="name" v-model="txt">
              <button id="btn" :class="status"></button>
            </form>
          </div>
        </div>
        <div class="admin__button">
          <a href="../">
            <div class="admin__button-text">
              <p>Вернуться</p>
            </div>
          </a>
        </div>
      </div>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>