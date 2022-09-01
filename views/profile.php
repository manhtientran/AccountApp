<div>
    <div class="left" id="divProfile1">
        <div><img src="https://www.citypng.com/public/uploads/small/11639594342hjraqgbufi3xlb66lt30fz1pwfcydxkjqbynfqdpvufz41ysjtngiet4dyrywgqqqqu56w5nozgrhyecs4ixrlllkl150ogbiid1.png" alt=""></div>
        <div>Account</div>
        <div>Notification</div>
        <div>Members</div>
        <div>Groups</div>
        <div>Guests</div>
        <div>Application</div>
    </div>

    <div class="left" id="divProfile2">
        <div id="sub_divProfile2">
            <div>
                <div class="left bold">
                    <p class="left bold"><?php echo $user->name ?></p>
                </div>
                <div class="right">
                    <button class="blue" id="editProfile">Edit my account</button>
                </div>
                <div class="clearBoth"></div>
            </div>

            <div>
                <form>
                    <div class="form-group">
                        <label>Email</label><br>
                        <input type="email" name="email" disabled value=<?php echo $user->email ?>>
                    </div>

                    <div class="form-group">
                        <label>Username</label><br>
                        <input type="text" name="userName" disabled value=<?php echo $user->username ?? null ?>>
                    </div>

                    <div class="form-group">
                        <label>Name</label><br>
                        <input type="text" name="name" value=<?php echo $user->name ?>>
                    </div>

                    <div class="form-group">
                        <label>Company name</label><br>
                        <input type="text" name="companyName" value=<?php echo $user->companyName ?>>
                    </div>

                    <div class="form-group">
                        <label>Job title</label><br>
                        <input type="text" name="jobTitle"  value=<?php echo $user->jobTitle ?>>
                    </div>

                    <br>
                    <input type="submit" value="Create an account">
                </form>

            </div>
        </div>
    </div>

    <div class="left">

    </div>

    <br class="clearBoth" />

</div>