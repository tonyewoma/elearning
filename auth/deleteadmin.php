             
                    <h3>Delete Classes From Catelog</h3>
                    <div style="margin:0 auto; width:300px;">
                    <?php
                                $id = $_GET['admin_id'];
				include_once("config.php");
				$sql = mysql_query("DELETE FROM users WHERE admin_id=$id",$connect);
				if(!$sql){
				 die("Unable to fetch data from databse".mysql_error());
				}else{
				echo "Record deleted successfully";
				}
		    ?>
		    <script type="text/javascript">
                    setTimeout('ourRedirect()', 2000)
                    function ourRedirect(){
                            location.href='register.php'
                    }
                    </script>
                    </div>
                </div>
                    <?php
                        //include("footer.php");
                    ?>