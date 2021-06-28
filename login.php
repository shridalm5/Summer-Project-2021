<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="st.css"/>
</head>
<body>
<?php
    session_start();

    
    
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {

                $ch = curl_init('http://106.214.24.120:7777/adfs/logincheck.php?username='.$_POST['username'].'&password='.$_POST['password']);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        
        curl_close($ch);

        //echo $data;

        $content = $data;
        $doc = new DomDocument();
        $doc->loadHTML($content); // That's the addition
        $thediv = $doc->getElementById('i');
        $flag=$thediv->textContent;
      if ($flag == 1) {
          $_SESSION['username'] = $_POST['username'];
          // Redirect to user dashboard page
          header("Location: dashboard.php");
      } else {
          echo "<div class='form'>
                <h3>Incorrect Username/password.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                </div>";
      }
  } else {
?>
<div class="login-box">
  <h2>Login</h2>
  <form method="post" name="login">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password"  required="">
      <label>Password</label>
      <input type="submit" name="submit" value="Click here to Login">
    </div>

      <a href="registration.php" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Register now
    </a>

<?php
    }
?>
</body>
</html>