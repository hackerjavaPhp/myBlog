<?php
require_once "db.php";
$isAuthorized = isset($_SESSION['user_id']) ? true : false;
?>
<header class="main-header">
  <div class="header_left_wrape">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?> "><div class="logo-wrap header-item">
      <i class="big spy icon"></i>
      <span id="blogname">BLOGGY</span>
    </div></a>
    <div class="ui fluid category search header-item">
      <div class="ui icon input">
        <input id="header-search" class="prompt" type="text" placeholder="Поиск . . .">
        <i class="search icon"></i>
      </div>
      <div class="results"></div>
    </div>
  </div>
  <?php 
  if ($isAuthorized) {
  ?>
  <div class="header_right_wrape">
    <div class="header-item"><i class="large grey alarm icon"></i> </div>
    <div class="header-item"><span>Username<i class="big grey user icon"></i></span></div>
    <div class="header-item"><i class="large grey ellipsis vertical icon"></i></div>
  </div>
  <?php 
  } else {
  ?>
    <div class="header_right_wrape">
      <i class="add user large icon" id="reg_button"></i>
      <i class="sign in big icon" id="sign_up_button"></i>
    </div>

  <?php
  }
  ?>

<div class="ui modal" id="sign_up_modal">
  <div class="header">Вход</div>
  <div class="content">
    <p>ssssssssss</p>
    <p>aaaaaaaaaaaa</p>
    <p>ddddddddddddd</p>
  </div>
</div>
<div class="ui tiny modal" id="reg_modal">
  <div class="header">Регистрация</div>
  <div class="content">
    <form action="" class="ui form" id="registration_form">
      <div class="field">
        <div class="two fields">
          <div class="field">
            <input type="text" name="user_fname" placeholder="Ваше имя">
          </div>
          <div class="field">
            <input type="text" name="user_lname" placeholder="Фамилия">
          </div>
        </div>
      </div>
      <div class="field">
        <input type="email" name="user_email" placeholder="Email">
      </div>
      <div class="field">
        <input type="password" name="user_password" placeholder="Пароль">
      </div>
      <div class="field">
        <input type="password" name="re_user_password" placeholder="Введите пароль ещё раз">
      </div>
      <br>
      <!-- <div class="actions"> -->
      <div class="ui primary approve button" id="registration">Регистрация</div>
      <div class="ui error message"></div>
      <!-- </div> -->
    </form>
  </div>
</div>
</header>