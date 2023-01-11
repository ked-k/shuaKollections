
<?php
if(isset($_POST['me']))
{
    include "../conn.php";
session_start();
$me = $_POST['me'];
  $newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
  $password = mysqli_real_escape_string($conn, $_POST['oldpass']);
  $password = md5($password);
  $newpassword = md5($newpass);

    $result = mysqli_query($conn, "SELECT * from users WHERE Id = '$me' and Password = '$password' ");
    $row = mysqli_fetch_array($result);
    if ($password == $row["Password"]) {
        mysqli_query($conn, "UPDATE users set Password ='" . $newpassword . "' WHERE Id='" . $me . "'");
                                         echo '<script language="javascript">';
                                        echo 'alert("Password Successfully changed!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=logout" />';
    } else
    {
        echo '<script language="javascript">';
                                        echo 'alert("Error, old password does not match!")';
                                        echo '</script>';
										
											echo  $conn->error;
											echo "<script type='text/javascript'>window.history.go(-1);</script>";
}
}
 else{
        echo '<script language="javascript">';
                                        echo 'alert("Error,!")';
                                        echo '</script>';
										
											 echo "<script type='text/javascript'>window.history.go(-1);</script>";
}
?>