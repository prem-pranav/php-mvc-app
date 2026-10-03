<main class="page-content">
    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="hero-background-glow"></div>
        <div class="hero-grid-pattern"></div>

        <div class="container hero-inner py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 hero-text-col">
                    <div class="hero-badge mb-3">
                        <span class="badge-dot"></span>
                        <span>High Performance PHP MVC Engine v2.4</span>
                    </div>
                    <h1 class="hero-title mb-4">
                        Build Scalable Web Apps with <span class="gradient-text">Zero Overhead</span>
                    </h1>
                    <p class="hero-description lead mb-4">
                        <?= htmlspecialchars($data['description'] ?? 'A lightweight, custom PHP MVC framework engineered for speed, clean architecture, and seamless admin management.') ?>
                    </p>
                    
                    <div class="hero-cta-group d-flex flex-wrap gap-3 align-items-center mb-4">
                        <a href="#quickstart" class="btn btn-hero-primary">
                            <span>Get Started Now</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="<?= BASE_URL ?>/admin" class="btn btn-hero-secondary">
                            <i class="bi bi-speedometer2"></i>
                            <span>Admin Portal</span>
                        </a>
                    </div>

                    <div class="hero-tech-pills d-flex align-items-center gap-3">
                        <span class="tech-pill"><i class="bi bi-check-circle-fill text-success me-1"></i> PHP 8.x Native</span>
                        <span class="tech-pill"><i class="bi bi-check-circle-fill text-success me-1"></i> PDO Security</span>
                        <span class="tech-pill"><i class="bi bi-check-circle-fill text-success me-1"></i> Role-Based Auth</span>
                    </div>
                </div>

                <div class="col-lg-6 hero-visual-col">
                    <div class="preview-window">
                        <div class="window-header d-flex align-items-center justify-content-between">
                            <div class="window-dots d-flex gap-2">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>
                            <div class="window-title">
                                <i class="bi bi-layers-half me-1"></i> MVC Engine Preview
                            </div>
                            <div class="window-action">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">Active</span>
                            </div>
                        </div>
                        <div class="window-body position-relative">
                            <img src="<?= BASE_URL ?>/img/hero_preview.jpg" alt="MVC Architecture Preview" class="img-fluid rounded-bottom hero-preview-img">
                            <div class="floating-badge badge-1">
                                <i class="bi bi-lightning-charge-fill text-warning"></i>
                                <div>
                                    <span class="badge-num">&lt; 2ms</span>
                                    <span class="badge-lbl">Response Time</span>
                                </div>
                            </div>
                            <div class="floating-badge badge-2">
                                <i class="bi bi-shield-lock-fill text-primary"></i>
                                <div>
                                    <span class="badge-num">100%</span>
                                    <span class="badge-lbl">Prepared PDO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metrics Bar -->
    <section class="metrics-section py-4 border-y">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="metric-card">
                        <div class="metric-value">100%</div>
                        <div class="metric-label">Native PHP Efficiency</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="metric-card">
                        <div class="metric-value">&lt; 2ms</div>
                        <div class="metric-label">Routing Latency</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="metric-card">
                        <div class="metric-value">PDO</div>
                        <div class="metric-label">SQL Injection Guard</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="metric-card">
                        <div class="metric-value">RBAC</div>
                        <div class="metric-label">Multi-Role Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section id="features" class="features-section py-5">
        <div class="container py-4">
            <div class="section-header text-center max-w-700 mx-auto mb-5">
                <span class="sub-title">CORE CAPABILITIES</span>
                <h2 class="section-title mt-2 mb-3">Designed for Speed, Security & Scalability</h2>
                <p class="section-desc">
                    Engineered from the ground up to eliminate bloated dependencies while delivering complete control over routing, business logic, and UI templates.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon-box bg-primary-subtle text-primary">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <h3 class="feature-title">Ultra-Fast Dispatcher</h3>
                        <p class="feature-text">
                            Lightweight regex routing maps incoming URIs to controllers, methods, and parameters in microseconds.
                        </p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2 text-primary me-2"></i> Clean URL rewriting</li>
                            <li><i class="bi bi-check2 text-primary me-2"></i> Dynamic route params</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon-box bg-success-subtle text-success">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h3 class="feature-title">PDO Security Engine</h3>
                        <p class="feature-text">
                            Singleton Database wrapper implementing PDO prepared statements to keep all database operations secure.
                        </p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2 text-success me-2"></i> SQL Injection immunity</li>
                            <li><i class="bi bi-check2 text-success me-2"></i> Prepared execution</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon-box bg-purple-subtle text-purple">
                            <i class="bi bi-sliders"></i>
                        </div>
                        <h3 class="feature-title">Admin Dashboard Silo</h3>
                        <p class="feature-text">
                            Dedicated administrative workspace with user management, role assignments, and system diagnostics.
                        </p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2 text-purple me-2"></i> User CRUD controls</li>
                            <li><i class="bi bi-check2 text-purple me-2"></i> Multi-level RBAC</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon-box bg-warning-subtle text-warning">
                            <i class="bi bi-bell"></i>
                        </div>
                        <h3 class="feature-title">Flash Message Feedback</h3>
                        <p class="feature-text">
                            Integrated session flash notification engine for seamless feedback on user actions across requests.
                        </p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2 text-warning me-2"></i> Auto-expiring alerts</li>
                            <li><i class="bi bi-check2 text-warning me-2"></i> Multi-style alert types</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon-box bg-info-subtle text-info">
                            <i class="bi bi-layout-split"></i>
                        </div>
                        <h3 class="feature-title">Modular Architecture</h3>
                        <p class="feature-text">
                            Clean separation between client-facing views and administrative tools, preventing code bloat.
                        </p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2 text-info me-2"></i> Independent controllers</li>
                            <li><i class="bi bi-check2 text-info me-2"></i> Isolated view templates</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon-box bg-danger-subtle text-danger">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h3 class="feature-title">Zero Dependency Bloat</h3>
                        <p class="feature-text">
                            No heavy vendor directories or complex build pipelines required. Deploy easily to any PHP host.
                        </p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2 text-danger me-2"></i> 100% PHP standard library</li>
                            <li><i class="bi bi-check2 text-danger me-2"></i> Instant local setup</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Architecture Life Cycle Section -->
    <section id="architecture" class="architecture-section py-5 bg-surface">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <span class="sub-title">UNDER THE HOOD</span>
                    <h2 class="section-title mt-2 mb-3">How the MVC Pipeline Executes</h2>
                    <p class="text-muted mb-4">
                        Every HTTP request follows a deterministic, ultra-lean execution lifecycle. Here is how your code flows from URL to rendered output.
                    </p>

                    <div class="arch-steps-wrapper d-flex flex-column gap-3">
                        <div class="arch-step-card active" data-step="1">
                            <div class="step-num">01</div>
                            <div class="step-info">
                                <h5>HTTP Request & Rewriting</h5>
                                <p>Apache <code>.htaccess</code> routes all traffic through <code>public/index.php</code>.</p>
                            </div>
                        </div>

                        <div class="arch-step-card" data-step="2">
                            <div class="step-num">02</div>
                            <div class="step-info">
                                <h5>Core Router Dispatch</h5>
                                <p>The <code>App</code> class extracts controller, method, and parameters from the URL array.</p>
                            </div>
                        </div>

                        <div class="arch-step-card" data-step="3">
                            <div class="step-num">03</div>
                            <div class="step-info">
                                <h5>Controller & Model Logic</h5>
                                <p>Controller invokes model methods to query the database using prepared PDO statements.</p>
                            </div>
                        </div>

                        <div class="arch-step-card" data-step="4">
                            <div class="step-num">04</div>
                            <div class="step-info">
                                <h5>View Composition</h5>
                                <p>Header, body view, and footer are rendered seamlessly with the populated data array.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" id="code-tabs">
                    <div class="code-showcase-box">
                        <div class="code-header d-flex align-items-center justify-content-between">
                            <div class="code-tabs-nav d-flex gap-2">
                                <button class="code-tab-btn active" data-tab="tab-controller">
                                    <i class="bi bi-filetype-php me-1"></i> HomeController.php
                                </button>
                                <button class="code-tab-btn" data-tab="tab-model">
                                    <i class="bi bi-database-gear me-1"></i> HomeModel.php
                                </button>
                                <button class="code-tab-btn" data-tab="tab-config">
                                    <i class="bi bi-gear-fill me-1"></i> config.php
                                </button>
                            </div>
                            <button class="btn-copy-code" onclick="copyCode(this, 'active-code-content')">
                                <i class="bi bi-clipboard"></i> Copy
                            </button>
                        </div>
                        <div class="code-body">
                            <div class="code-panel active" id="tab-controller">
                                <pre><code id="active-code-content">&lt;?<span class="token-keyword">php</span>

<span class="token-keyword">class</span> <span class="token-fn">HomeController</span> <span class="token-keyword">extends</span> Controller {
    <span class="token-keyword">public function</span> <span class="token-fn">index</span>(<span class="token-var">$name</span> = <span class="token-str">''</span>) {
        <span class="token-comment">// Load model</span>
        <span class="token-var">$homeModel</span> = <span class="token-var">$this</span>-&gt;<span class="token-fn">model</span>(<span class="token-str">'client/HomeModel'</span>);
        <span class="token-var">$welcomeMessage</span> = <span class="token-var">$homeModel</span>-&gt;<span class="token-fn">getWelcomeMessage</span>();

        <span class="token-var">$data</span> = [
            <span class="token-str">'title'</span>       =&gt; SITENAME . <span class="token-str">' | High Performance MVC'</span>,
            <span class="token-str">'description'</span> =&gt; <span class="token-var">$welcomeMessage</span>,
            <span class="token-str">'name'</span>        =&gt; <span class="token-var">$name</span>
        ];
        
        <span class="token-comment">// Render Views</span>
        <span class="token-var">$this</span>-&gt;<span class="token-fn">view</span>(<span class="token-str">'client/header'</span>, <span class="token-var">$data</span>);
        <span class="token-var">$this</span>-&gt;<span class="token-fn">view</span>(<span class="token-str">'client/home'</span>, <span class="token-var">$data</span>);
        <span class="token-var">$this</span>-&gt;<span class="token-fn">view</span>(<span class="token-str">'client/footer'</span>, <span class="token-var">$data</span>);
    }
}</code></pre>
                            </div>

                            <div class="code-panel" id="tab-model">
                                <pre><code>&lt;?<span class="token-keyword">php</span>

<span class="token-keyword">class</span> <span class="token-fn">HomeModel</span> {
    <span class="token-keyword">private</span> <span class="token-var">$db</span>;

    <span class="token-keyword">public function</span> <span class="token-fn">__construct</span>() {
        <span class="token-var">$this</span>-&gt;db = Database::<span class="token-fn">getInstance</span>();
    }

    <span class="token-keyword">public function</span> <span class="token-fn">getWelcomeMessage</span>() {
        <span class="token-keyword">return</span> <span class="token-str">"Welcome to the PHP MVC App Client Section!"</span>;
    }
}</code></pre>
                            </div>

                            <div class="code-panel" id="tab-config">
                                <pre><code>&lt;?<span class="token-keyword">php</span>

<span class="token-fn">define</span>(<span class="token-str">'DB_HOST'</span>, <span class="token-str">'localhost'</span>);
<span class="token-fn">define</span>(<span class="token-str">'DB_USER'</span>, <span class="token-str">'root'</span>);
<span class="token-fn">define</span>(<span class="token-str">'DB_PASS'</span>, <span class="token-str">''</span>);
<span class="token-fn">define</span>(<span class="token-str">'DB_NAME'</span>, <span class="token-str">'phpmvcapp_db'</span>);

<span class="token-fn">define</span>(<span class="token-str">'BASE_URL'</span>, <span class="token-str">'http://localhost/php-mvc-app/public'</span>);
<span class="token-fn">define</span>(<span class="token-str">'SITENAME'</span>, <span class="token-str">'PHP MVC App'</span>);</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Start Command Block -->
    <section id="quickstart" class="quickstart-section py-5">
        <div class="container py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="sub-title">GET STARTED IN SECONDS</span>
                    <h2 class="section-title mt-2 mb-3">Simple Setup, Powerful Results</h2>
                    <p class="section-desc mb-4">
                        Get your application running locally in under 60 seconds with simple database setup and zero build steps.
                    </p>

                    <div class="qs-steps d-flex flex-column gap-3">
                        <div class="qs-step d-flex gap-3 align-items-start">
                            <span class="qs-step-badge">1</span>
                            <div>
                                <h6 class="mb-1 fw-semibold">Configure Database</h6>
                                <p class="small text-muted mb-0">Import <code>database_schema.sql</code> into your MySQL server and set credentials in <code>app/config.php</code>.</p>
                            </div>
                        </div>
                        <div class="qs-step d-flex gap-3 align-items-start">
                            <span class="qs-step-badge">2</span>
                            <div>
                                <h6 class="mb-1 fw-semibold">Seed Admin Account</h6>
                                <p class="small text-muted mb-0">Execute <code>php create_admin.php</code> in terminal or open it in your web browser.</p>
                            </div>
                        </div>
                        <div class="qs-step d-flex gap-3 align-items-start">
                            <span class="qs-step-badge">3</span>
                            <div>
                                <h6 class="mb-1 fw-semibold">Launch & Build</h6>
                                <p class="small text-muted mb-0">Access your client application at <code>/public</code> and your admin console at <code>/public/admin</code>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="terminal-card">
                        <div class="terminal-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-terminal-fill text-muted"></i>
                                <span class="terminal-title">powershell / bash</span>
                            </div>
                            <button class="btn-copy-code" onclick="copyCode(this, 'terminal-commands')">
                                <i class="bi bi-clipboard me-1"></i> Copy
                            </button>
                        </div>
                        <div class="terminal-body">
                            <pre><code id="terminal-commands"><span class="cmd-comment"># 1. Clone the repository</span>
git clone https://github.com/prem-pranav/php-mvc-app.git
cd php-mvc-app

<span class="cmd-comment"># 2. Seed default Superadmin user</span>
php create_admin.php

<span class="cmd-comment"># 3. Start local PHP server (Optional alternative to XAMPP)</span>
php -S localhost:8000 -t public</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom CTA Card -->
    <section class="cta-banner-section py-5">
        <div class="container">
            <div class="cta-banner-card position-relative overflow-hidden p-5 text-center text-white">
                <div class="cta-glow"></div>
                <div class="cta-content position-relative z-1 max-w-700 mx-auto">
                    <span class="badge bg-white-subtle text-white border border-white-subtle mb-3 px-3 py-2 rounded-pill">Ready to Build?</span>
                    <h2 class="display-6 fw-bold mb-3">Accelerate Your PHP Application Development</h2>
                    <p class="lead opacity-80 mb-4">
                        Take full control of your web app with a clean MVC architecture and built-in role-based admin controls.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="<?= BASE_URL ?>/admin" class="btn btn-cta-light">
                            <i class="bi bi-speedometer2 me-1"></i> Open Admin Portal
                        </a>
                        <a href="#quickstart" class="btn btn-cta-outline">
                            <i class="bi bi-journal-code me-1"></i> View Quickstart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

