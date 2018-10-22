<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="index.php">Exypnos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavBar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="mainNavBar">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Posts
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="./post.php?action=add">Add Post</a>
          <a class="dropdown-item" href="index.php">Edit Posts</a>
        </div>
      </li>

      <?php if ($permission == 1) {echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Users</a> <div class="dropdown-menu"><a class="dropdown-item" href="./addUser.php">Add User</a></div></li>';}?>

      <?php if ($permission == 1) {echo '<li class="nav-item"><a class="nav-link" href="category.php">Category</a></li>';}?>

    </ul>
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];}  ?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="../tasks/logout.php">Log out</a>
        </div>
      </li>
    </ul>

  </div>
</nav>