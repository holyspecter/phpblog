<div id="header">
    <h1><a href="http://web-mastery.info/">mini<strong>BLOG</strong> 1.0</a></h1>
    <h2>For all your blogging needs.</h2>
    <ul id="nav">
      <li><a href="index.php">Главная</a></li>
      <?php        
        if (isset($_SESSION['adm'])) {
          echo "<li><a href='http://localhost/phpblog/adm/create.php' title='Создать'>Создать</a></li>";
          echo "<li><a href='http://localhost/phpblog/adm/exit.php' title='Выйти'>Выйти</a></li>";
        } else 
            echo "<li><a href='http://localhost/phpblog/adm/index.php' title='Войти'>Войти</a></li>";
        ?>            
    </ul>
  </div>
  <div id="sidebar">
    <h1>The Sidebar</h1>
    <p> This is where you will put anything that uhm, belongs here really. Latest Comments. Submenus. Blogrolls. Affiliates. Anything! </p>
    <h1>Menu Take 2</h1>
    <ul class="submenu">
      <li><a href="#intro">Intro</a></li>
      <li><a href="#css">css &amp; xhtml</a></li>
      <li><a href="#about">About the author</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <h1>Check it out!</h1>
    <ul class="submenu">
      <li><a href="http://web-mastery.info/">Six Shooter Media</a></li>
      <li><a href="http://web-mastery.info/">JamesKoster.co.uk</a></li>
      <li><a href="http://web-mastery.info/">Buy a Button!</a></li>
      <li><a href="http://web-mastery.info/">Open Web Design</a></li>
      <li><a href="http://web-mastery.info/">OSWD</a></li>
    </ul>
    <p class="note"> Here is a special paragraph for any important notes that you might want to display. </p>
  </div>

