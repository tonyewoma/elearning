 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-globe"></span> Home</a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <!-- <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Products</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="#">Engage</a></li>
                            <li><a href="#">Pontificate</a></li>
                            <li><a href="#">Synergize</a></li>
                        </ul>
                    </li>    
                </ul> -->
                <!-- Log Out -->
                <div class="navbar-form navbar-right form-inline">
                 <div class="form-group" style="color: #fff;">
                 <?php echo $userRow['user_name']; ?>
                 </div>

                  <div class="form-group">
                        <a href="logout.php?logout"  class="btn btn-default">Sign Out</a>
                 </div>
                 </div>
                
               
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>