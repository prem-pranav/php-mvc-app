    <main class="page-content">
        <section class="hero">
            <div class="container hero-inner">
                <p class="lead"><?= $data['description'] ?? 'A lightweight PHP MVC starter. Build fast, keep it simple.' ?></p>
                <a href="<?= BASE_URL ?>" class="btn btn-primary btn-cta">Explore</a>
            </div>
        </section>

        <section class="features container">
            <div class="feature-grid">
                <div class="feature">
                    <i class="bi bi-speedometer2 feature-icon"></i>
                    <h3>Performance</h3>
                    <p>Fast, minimal, and easy to deploy.</p>
                </div>
                <div class="feature">
                    <i class="bi bi-shield-lock feature-icon"></i>
                    <h3>Secure</h3>
                    <p>Small attack surface, sensible defaults.</p>
                </div>
                <div class="feature">
                    <i class="bi bi-code feature-icon"></i>
                    <h3>Extensible</h3>
                    <p>Clear structure for quick feature additions.</p>
                </div>
            </div>
        </section>
    </main>
