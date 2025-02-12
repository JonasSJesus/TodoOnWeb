    <?php require_once 'Includes/header.php'; ?>

    <main class="container">
        <div class="profile-container">
            <h2>Profile Settings</h2>
            
            <form class="profile-form" method="post">
                <div class="profile-section" style="margin-bottom: 20px;">
                    <h3>Personal Information</h3>
                    <div class="form-group">
                        <label for="id">User Id</label>
                        <input type="text" id="id" name="id" value="<?= $user->getId(); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="name" value="<?= $user->name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= $user->email; ?>" required>
                    </div>
                    <button type="submit" class="btn-primary">Update Profile</button>
                    <a href="/edit-pwd?id=<?= $user->getId(); ?>" class="btn-secondary">Edit Password</a>
                </div>
            </form>
            <div class="profile-section danger-zone">
                <h3>Danger Zone</h3>
                <a href="/delete-user?id=<?= $user->getId(); ?>" class="btn-danger">Delete Account</a>
            </div>
        </div>
    </main>
</body>
</html>