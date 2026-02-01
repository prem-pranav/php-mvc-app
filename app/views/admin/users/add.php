<div class="card shadow-sm border-0" style="max-width: 600px; margin: 0 auto; border-radius: 12px;">
    <div class="card-header bg-white py-3 border-bottom">
        <h5 class="mb-0">Add New User</h5>
    </div>
    <div class="card-body p-4">
        <form action="<?= BASE_URL ?>/admin/users/add" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label fw-medium">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-medium">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-medium">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Create a password" required>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="role" class="form-label fw-medium">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin">Admin</option>
                        <option value="superadmin">Superadmin</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label fw-medium">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="<?= BASE_URL ?>/admin/users" class="btn btn-light px-4">Cancel</a>
                <button type="submit" class="btn btn-primary px-4">Save User</button>
            </div>
        </form>
    </div>
</div>
