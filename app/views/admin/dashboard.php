<!-- Dashboard Header Tile Banner -->
<div class="dashboard-banner mb-4">
    <div class="banner-glow"></div>
    <div class="banner-content d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="banner-text">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 fw-semibold">
                    <i class="bi bi-shield-check me-1"></i> Admin Portal
                </span>
                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fw-semibold">
                    <span class="status-dot-inline"></span> Operational
                </span>
            </div>
            <h2 class="banner-title mb-1">
                Welcome back, <?= htmlspecialchars(Auth::user()->name) ?>! 👋
            </h2>
            <p class="banner-subtext mb-0 text-muted">
                Here is what's happening across your PHP MVC application today.
            </p>
        </div>

        <div class="banner-actions d-flex align-items-center gap-2">
            <span class="date-badge text-muted">
                <i class="bi bi-calendar3 me-1"></i> <?= date('F j, Y') ?>
            </span>
            <?php if (Auth::can('MANAGE_USERS')): ?>
            <a href="<?= BASE_URL ?>/admin/users" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1">
                <i class="bi bi-person-plus-fill"></i> Manage Users
            </a>
            <?php endif; ?>
            <a href="<?= BASE_URL ?>" target="_blank" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1">
                <i class="bi bi-box-arrow-up-right"></i> View Client Site
            </a>
        </div>
    </div>
</div>

<!-- KPI Metric Summary Tiles Row -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="kpi-card kpi-indigo">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="kpi-title">TOTAL REGISTERED</span>
                    <div class="kpi-value"><?= number_format($data['totalUsers'] ?? 0) ?></div>
                    <span class="kpi-subtitle text-muted"><i class="bi bi-people me-1"></i> User Accounts</span>
                </div>
                <div class="kpi-icon icon-indigo">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
            <div class="kpi-bar bg-indigo"></div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="kpi-card kpi-emerald">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="kpi-title">ACTIVE ACCOUNTS</span>
                    <div class="kpi-value text-emerald"><?= number_format($data['activeUsers'] ?? 0) ?></div>
                    <span class="kpi-subtitle text-emerald"><i class="bi bi-check-circle-fill me-1"></i> Ready & Validated</span>
                </div>
                <div class="kpi-icon icon-emerald">
                    <i class="bi bi-person-check-fill"></i>
                </div>
            </div>
            <div class="kpi-bar bg-emerald"></div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="kpi-card kpi-purple">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="kpi-title">ADMINISTRATORS</span>
                    <div class="kpi-value text-purple"><?= number_format($data['adminUsers'] ?? 0) ?></div>
                    <span class="kpi-subtitle text-muted"><i class="bi bi-shield-lock me-1"></i> RBAC Silo Privileges</span>
                </div>
                <div class="kpi-icon icon-purple">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
            </div>
            <div class="kpi-bar bg-purple"></div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="kpi-card kpi-cyan">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="kpi-title">SYSTEM LATENCY</span>
                    <div class="kpi-value text-cyan">&lt; 2ms</div>
                    <span class="kpi-subtitle text-muted"><i class="bi bi-lightning-charge me-1"></i> Pure PHP Engine</span>
                </div>
                <div class="kpi-icon icon-cyan">
                    <i class="bi bi-cpu-fill"></i>
                </div>
            </div>
            <div class="kpi-bar bg-cyan"></div>
        </div>
    </div>
</div>

<!-- Main Subsections Grid -->
<div class="row g-4">
    <!-- Subsection Left: Recent Accounts Table & Quick Tools -->
    <div class="col-lg-8">
        <div class="dashboard-subsection-card mb-4">
            <div class="subsection-header d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <div class="section-icon-pill bg-primary-subtle text-primary">
                        <i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div>
                        <h5 class="subsection-title mb-0">Recently Registered Accounts</h5>
                        <small class="text-muted">Latest accounts created across administrative and user roles</small>
                    </div>
                </div>
                <?php if (Auth::can('MANAGE_USERS')): ?>
                <a href="<?= BASE_URL ?>/admin/users" class="btn btn-outline-primary btn-sm">
                    View All Users <i class="bi bi-arrow-right ms-1"></i>
                </a>
                <?php endif; ?>
            </div>

            <div class="subsection-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 custom-admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Account</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['recentUsers'])): ?>
                                <?php foreach ($data['recentUsers'] as $user): ?>
                                    <?php 
                                        $uId = is_object($user) ? $user->id : $user['id'];
                                        $uName = is_object($user) ? $user->name : $user['name'];
                                        $uEmail = is_object($user) ? $user->email : $user['email'];
                                        $uRole = is_object($user) ? $user->role : $user['role'];
                                        $uStatus = is_object($user) ? ($user->status ?? 'active') : ($user['status'] ?? 'active');
                                    ?>
                                    <tr>
                                        <td class="fw-mono text-muted">#<?= sprintf('%03d', $uId) ?></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="user-avatar-sm">
                                                    <?= strtoupper(substr($uName, 0, 1)) ?>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold text-dark"><?= htmlspecialchars($uName) ?></div>
                                                    <div class="small text-muted"><?= htmlspecialchars($uEmail) ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($uRole === 'superadmin'): ?>
                                                <span class="badge bg-purple-subtle text-purple border border-purple-subtle">
                                                    <i class="bi bi-star-fill me-1"></i> Superadmin
                                                </span>
                                            <?php elseif ($uRole === 'admin'): ?>
                                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                                                    <i class="bi bi-shield-fill me-1"></i> Admin
                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">
                                                    <i class="bi bi-person me-1"></i> User
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($uStatus === 'active'): ?>
                                                <span class="badge bg-success-subtle text-success border border-success-subtle">
                                                    <i class="bi bi-check-circle-fill me-1"></i> Active
                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                                    <i class="bi bi-x-circle-fill me-1"></i> Inactive
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-end">
                                            <?php if (Auth::can('MANAGE_USERS')): ?>
                                            <a href="<?= BASE_URL ?>/admin/users/edit/<?= $uId ?>" class="btn btn-sm btn-action-icon" title="Edit User">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <?php else: ?>
                                            <span class="text-muted small">Read-Only</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        No users registered yet.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Administration Controls Grid -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="quick-action-tile">
                    <div class="d-flex align-items-center gap-3">
                        <div class="action-icon bg-primary text-white">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <div>
                            <h6 class="action-title mb-1">User Management</h6>
                            <p class="action-desc mb-2">Create, update roles, or manage system permissions.</p>
                            <a href="<?= BASE_URL ?>/admin/users" class="action-link">Open User Manager <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="quick-action-tile">
                    <div class="d-flex align-items-center gap-3">
                        <div class="action-icon bg-dark text-white">
                            <i class="bi bi-journal-code"></i>
                        </div>
                        <div>
                            <h6 class="action-title mb-1">System Error Logs</h6>
                            <p class="action-desc mb-2">Inspect <code>app/logs/error.log</code> for runtime telemetry.</p>
                            <span class="badge bg-secondary-subtle text-secondary">Active Logging</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subsection Right: System Architecture Diagnostics & Status -->
    <div class="col-lg-4">
        <!-- System Diagnostics Card -->
        <div class="dashboard-subsection-card mb-4">
            <div class="subsection-header d-flex align-items-center gap-2">
                <div class="section-icon-pill bg-success-subtle text-success">
                    <i class="bi bi-activity"></i>
                </div>
                <div>
                    <h5 class="subsection-title mb-0">Environment Diagnostics</h5>
                    <small class="text-muted">Core server engine configuration</small>
                </div>
            </div>

            <div class="subsection-body">
                <div class="diag-item d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="diag-label"><i class="bi bi-code-slash text-primary me-2"></i> PHP Version</span>
                    <span class="badge bg-light text-dark border fw-mono"><?= PHP_VERSION ?></span>
                </div>
                <div class="diag-item d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="diag-label"><i class="bi bi-database text-success me-2"></i> Database Driver</span>
                    <span class="badge bg-success-subtle text-success border border-success-subtle">PDO MySQL</span>
                </div>
                <div class="diag-item d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="diag-label"><i class="bi bi-shield-check text-purple me-2"></i> Auth Protection</span>
                    <span class="badge bg-purple-subtle text-purple border border-purple-subtle">RBAC Active</span>
                </div>
                <div class="diag-item d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="diag-label"><i class="bi bi-journal-text text-info me-2"></i> Error Logging</span>
                    <span class="badge bg-info-subtle text-info border border-info-subtle">Enabled</span>
                </div>
                <div class="diag-item d-flex justify-content-between align-items-center py-2">
                    <span class="diag-label"><i class="bi bi-layers text-warning me-2"></i> MVC Engine</span>
                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Active</span>
                </div>
            </div>
        </div>

        <!-- System Activity & Health Card -->
        <div class="dashboard-subsection-card">
            <div class="subsection-header d-flex align-items-center gap-2">
                <div class="section-icon-pill bg-purple-subtle text-purple">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <div>
                    <h5 class="subsection-title mb-0">Active Session Guard</h5>
                    <small class="text-muted">Security context details</small>
                </div>
            </div>

            <div class="subsection-body">
                <div class="session-guard-box p-3 bg-light rounded-3 border mb-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="small fw-semibold text-muted">LOGGED USER</span>
                        <span class="badge bg-primary text-white"><?= ucfirst(Auth::user()->role) ?></span>
                    </div>
                    <div class="fw-bold text-dark mb-1"><?= htmlspecialchars(Auth::user()->name) ?></div>
                    <div class="small text-muted font-mono"><?= htmlspecialchars(Auth::user()->email) ?></div>
                </div>

                <div class="alert alert-info py-2 px-3 small mb-0 d-flex align-items-center gap-2">
                    <i class="bi bi-info-circle-fill flex-shrink-0"></i>
                    <span>Sessions automatically expire upon inactivity to ensure compliance.</span>
                </div>
            </div>
        </div>
    </div>
</div>
