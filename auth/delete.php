             
                    <h3>Delete Books From Catelog</h3>
                    <div style="margin:0 auto; width:300px;">
                    <?php
                                $id = $_GET['id'];
				include_once("config.php");
				$sql = mysql_query("DELETE FROM club_material WHERE id=$id",$connect);
				if(!$sql){
				 die("Unable to fetch data from databse".mysql_error());
				}else{
				echo "Record deleted successfully";
				}
		    ?>
		    <script type="text/javascript">
                    setTimeout('ourRedirect()', 2000)
                    function ourRedirect(){
                            location.href='book.php'
                    }
                    </script>
                    </div>
                </div>
                    <?php
                        //include("footer.php");
                    ?>