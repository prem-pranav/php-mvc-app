<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
        <h5 class="mb-0">User Management</h5>
        <a href="<?= BASE_URL ?>/admin/users/add" class="btn btn-primary btn-sm">
            <i class="bi bi-person-plus-fill me-1"></i> Add User
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th class="pe-4 text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['users'] as $user) : ?>
                    <tr>
                        <td class="ps-4"><?= $user->id; ?></td>
                        <td>
                            <div class="fw-bold"><?= $user->name; ?></div>
                        </td>
                        <td><?= $user->email; ?></td>
                        <td>
                            <span class="badge <?= $user->role == 'superadmin' ? 'bg-primary' : 'bg-secondary' ?>">
                                <?= ucfirst($user->role); ?>
                            </span>
                        </td>
                        <td>
                            <span class="badge <?= $user->status == 'active' ? 'bg-success' : 'bg-danger' ?> rounded-pill">
                                <?= ucfirst($user->status); ?>
                            </span>
                        </td>
                        <td class="text-muted small"><?= date('M d, Y', strtotime($user->created_at)); ?></td>
                        <td class="pe-4 text-end">
                            <a href="<?= BASE_URL ?>/admin/users/edit/<?= $user->id; ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="<?= BASE_URL ?>/admin/users/delete/<?= $user->id; ?>" class="btn btn-sm btn-outline-danger ms-1" onclick="return confirm('Are you sure you want to delete this user?')" title="Delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
