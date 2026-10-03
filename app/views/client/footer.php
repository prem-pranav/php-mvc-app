    <footer class="page-footer mt-5">
        <div class="container footer-inner">
            <div class="footer-top row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <img src="<?= BASE_URL ?>/img/logo.png" alt="Logo" class="footer-logo">
                            <span class="footer-title"><?= SITENAME ?></span>
                        </div>
                        <p class="footer-desc">
                            A high-performance, lightweight custom PHP MVC engine designed for speed, security, and developer clarity.
                        </p>
                        <div class="status-pill">
                            <span class="status-dot"></span>
                            <span>All Systems Operational</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="footer-heading">Framework</h5>
                    <ul class="footer-links">
                        <li><a href="#features">Key Features</a></li>
                        <li><a href="#architecture">Architecture</a></li>
                        <li><a href="#quickstart">Quick Start</a></li>
                        <li><a href="#code-tabs">Code Examples</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="footer-heading">Administration</h5>
                    <ul class="footer-links">
                        <li><a href="<?= BASE_URL ?>/admin">Admin Dashboard</a></li>
                        <li><a href="<?= BASE_URL ?>/admin/auth/login">Admin Login</a></li>
                        <li><a href="<?= BASE_URL ?>/admin/users">User Management</a></li>
                        <li><a href="https://github.com" target="_blank" rel="noopener">GitHub Repo</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-heading">Core Stack</h5>
                    <div class="stack-tags">
                        <span class="stack-tag"><i class="bi bi-code-slash"></i> PHP 8.x+</span>
                        <span class="stack-tag"><i class="bi bi-database"></i> MySQL / PDO</span>
                        <span class="stack-tag"><i class="bi bi-layers"></i> MVC Engine</span>
                        <span class="stack-tag"><i class="bi bi-shield-check"></i> Session Auth</span>
                        <span class="stack-tag"><i class="bi bi-bootstrap"></i> Bootstrap 5</span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="copyright mb-0">&copy; <?= date('Y') ?> <strong><?= SITENAME ?></strong>. Built with precision for modern PHP web applications.</p>
                <div class="footer-socials">
                    <a href="#" class="social-link" title="Documentation"><i class="bi bi-book"></i></a>
                    <a href="#" class="social-link" title="GitHub"><i class="bi bi-github"></i></a>
                    <a href="#" class="social-link" title="Security"><i class="bi bi-shield-lock"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Interactive Code Tabs
            const codeTabs = document.querySelectorAll('.code-tab-btn');
            const codePanels = document.querySelectorAll('.code-panel');

            codeTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const target = tab.getAttribute('data-tab');
                    codeTabs.forEach(t => t.classList.remove('active'));
                    codePanels.forEach(p => p.classList.remove('active'));

                    tab.classList.add('active');
                    const activePanel = document.getElementById(target);
                    if (activePanel) activePanel.classList.add('active');
                });
            });

            // Architecture Step Selector
            const archSteps = document.querySelectorAll('.arch-step-card');
            archSteps.forEach(step => {
                step.addEventListener('click', () => {
                    archSteps.forEach(s => s.classList.remove('active'));
                    step.classList.add('active');
                });
            });

            // Copy Snippet functionality
            window.copyCode = function(button, codeId) {
                const codeElement = document.getElementById(codeId);
                if (!codeElement) return;

                const textToCopy = codeElement.innerText;
                navigator.clipboard.writeText(textToCopy).then(() => {
                    const originalText = button.innerHTML;
                    button.innerHTML = '<i class="bi bi-check2 text-success"></i> Copied!';
                    button.classList.add('copied');
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.classList.remove('copied');
                    }, 2000);
                }).catch(err => {
                    console.error('Failed to copy text: ', err);
                });
            };
        });
    </script>
</body>
</html>

