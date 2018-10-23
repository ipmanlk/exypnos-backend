<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="index.php">Exypnos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavBar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="mainNavBar">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <i class="fa fa-file">&nbsp;</i>
          Posts
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="./post.php?action=add">
            <i class="fa fa-plus-square">&nbsp;</i>
            Add Post
          </a>
          <a class="dropdown-item" href="postList.php">
            <i class="fa fa-edit">&nbsp;</i>
            Post List
          </a>
        </div>
      </li>

      <?php if (USER_PERMISSION == 1) {echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-users">&nbsp;</i>Users</a> <div class="dropdown-menu"><a class="dropdown-item" href="./addUser.php"><i class="fa fa-user-plus">&nbsp;</i>Add User</a></div></li>';}?>

      <?php if (USER_PERMISSION == 1) {echo '<li class="nav-item"><a class="nav-link" href="category.php"><i class="fa fa-tags">&nbsp;</i>Category</a></li>';}?>

    </ul>
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <i class="fa fa-user">&nbsp;</i>
          <?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];}  ?>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="profile.php">
            <i class="fa fa-user-edit">&nbsp;</i>
            Profile
          </a>
          <a class="dropdown-item" href="../tasks/logout.php">
            <i class="fa fa-times-circle">&nbsp;</i>
            Log out
          </a>
        </div>
      </li>
    </ul>

  </div>
</nav>