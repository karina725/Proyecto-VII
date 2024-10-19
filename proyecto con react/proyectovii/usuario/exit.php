<?php
 if (!isset($_SESSION['user_session']))
  {
    session_start();
  }

	session_destroy();
	echo "<script type=\"text/javascript\">
              document.location=('../index.php');
            </script> ";
?>