<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-change">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Home</a>
        </div>

        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="add_edit.php">Add a project</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="userhome.php"><?php echo $_SESSION['sess_username'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
	</div>
</div>