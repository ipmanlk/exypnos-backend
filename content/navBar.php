<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">Exypnos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavBar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="mainNavBar">
    <ul class="navbar-nav mr-aut">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Add Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addUser.php">Add User</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];}  ?></a>
      </li>
    </ul>
  </div>
</nav>