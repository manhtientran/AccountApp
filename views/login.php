<div id="master">
  <div id="page">
    <div id="abovePage">
      <img src='https://share-gcdn.basecdn.net/brand/logo.full.png' />
      <h2>Login</h2>
      <p>Welcome back. Login to start working.</p>
    </div>

    <div id="belowPage">
    <div class= <?php if ($code == 400) echo "error"; ?>> 
        <?php echo $message ?? "" ?>
      </div>

      <form action="" method="post">

        <div class="form-group">
        <label>Email</label><br>
        <input type="email" name="email" placeholder="Email" required>
        </div>
        
        <div class="form-group">
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password" required>
        </div>

        <br>
        <input type="submit" value="Login to start working">
      </form>
      <hr>
      <a href="/register"><button type="button" class="blue">Create a new account</button></a>

    </div>
  </div>
</div>