<div id="master">
  <div id="page">
    <div id="abovePage">
      <img src='https://share-gcdn.basecdn.net/brand/logo.full.png' />
      <h2>Create a new account</h2>
    </div>

    <div id="belowPage">
      <div class= <?php if ($code === 201) echo "success"; else if ($code === 400) echo "error"; else echo ""; ?>> 
        <?php echo $message ?? "" ?>
      </div>
      <form action="" method="post">

        <div class="form-group">
        <label>Email</label><br>
        <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
        <label>Username</label><br>
        <input type="text" name="userName" placeholder="Username" required>
        </div>

        <div class="form-group">
        <label>Name</label><br>
        <input type="text" name="name" placeholder="Name" required>
        </div>
        
        <div class="form-group">
        <label>Company name</label><br>
        <input type="text" name="companyName" placeholder="Company name" required>
        </div>

        <div class="form-group">
        <label>Job title</label><br>
        <input type="text" name="jobTitle" placeholder="Job title" required>
        </div>

        <div class="form-group">
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password" required>
        </div>

        <br>
        <input type="submit" value="Create an account">
      </form>
    </div>
  </div>
</div>