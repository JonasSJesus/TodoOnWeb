<?php require_once __DIR__ . '/Includes/header.php'; ?>

<main class="container">
    <div class="profile-container">

        <form class="profile-form">
            <div class="profile-section" style="margin-bottom: 20px;">
                <h3>Change Password <span class="todo">AINDA NÃO ESTÁ FUNCIONANDO!</span></h3>
                <div class="form-group">
                    <label for="current-password">Current Password <span class="todo">AINDA NÃO ESTÁ FUNCIONANDO!</span></label>
                    <input type="password" id="current-password" name="current_password">
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" id="new-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-new-password">Confirm New Password</label>
                    <input type="password" id="confirm-new-password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn-primary">Confirmar</button>
                <a href="/profile?id=<?= $_SESSION['id'] ?>" class="btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>
