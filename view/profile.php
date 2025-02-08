    <?php require_once 'Includes/header.php'; ?>

    <main class="container">
        <div class="profile-container">
            <h2>Profile Settings</h2>
            
            <form class="profile-form" method="post">
                <div class="profile-section">
                    <h3>Personal Information</h3>
                    <div class="form-group">
                        <label for="id">User Id</label>
                        <input type="text" id="id" name="id" value="<?= $user->id; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="name" value="<?= $user->name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= $user->email; ?>" required>
                    </div>
                    <button type="submit" class="btn-primary"><a>Update Profile</a></button>
                </div>
            </form>

            <form class="profile-form">
                <div class="profile-section">
                    <h3>Change Password</h3>
                    <div class="form-group">
                        <label for="current-password">Current Password (in progress...)</label>
                        <input type="password" id="current-password" >
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" id="new-password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-new-password">Confirm New Password</label>
                        <input type="password" id="confirm-new-password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn-primary">Change Password</button>
                </div>
            </form>

            <div class="profile-section danger-zone">
                <h3>Danger Zone</h3>
                <button class="btn-danger">Delete Account</button>
            </div>
        </div>
    </main>
</body>
</html>