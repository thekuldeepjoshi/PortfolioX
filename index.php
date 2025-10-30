<?php
declare(strict_types=1);

require __DIR__ . '/app/content_loader.php';

$profile = load_personal_profile();
$projects = load_projects();
$experiences = load_experiences();
$education = load_education_and_certificates();
$skills = load_skills();
$testimonials = load_testimonials();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($profile['name']); ?> · <?php echo htmlspecialchars($profile['role']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($profile['tagline']); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="#home" class="brand"><?php echo htmlspecialchars($profile['name']); ?></a>
            <nav class="site-nav" aria-label="Primary">
                <button class="nav-toggle" aria-expanded="false" aria-controls="nav-links">Menu</button>
                <div class="nav-links" id="nav-links">
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#portfolio">Portfolio</a>
                    <a href="#experience">Experience</a>
                    <a href="#education">Education &amp; Certificates</a>
                    <a href="#skills">Skills</a>
                    <a href="#testimonials">Testimonials</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section id="home" class="section hero">
            <div class="container">
                <div class="hero-content">
                    <p class="eyebrow"><?php echo htmlspecialchars($profile['location']); ?></p>
                    <h1><?php echo htmlspecialchars($profile['name']); ?> <span></span></h1>
                    <h3><?php echo htmlspecialchars($profile['role']); ?></span></h3>
                    <p class="tagline"><?php echo htmlspecialchars($profile['tagline']); ?></p>
                    <div class="cta">
                        <a class="button primary" href="#portfolio">Explore portfolio</a>
                        <a class="button ghost" href="mailto:<?php echo htmlspecialchars($profile['email']); ?>">Email me</a>
                    </div>
                </div>
                <figure class="hero-visual">
                    <img src="assets/img/hero-portrait.svg" alt="Abstract representation of <?php echo htmlspecialchars($profile['name']); ?>">
                    <figcaption>Crafting resilient software experiences</figcaption>
                </figure>
            </div>
        </section>

        <section id="about" class="section about">
            <div class="container">
                <div class="about-text">
                    <h2>About</h2>
                    <p><?php echo nl2br(htmlspecialchars($profile['about'])); ?></p>
                </div>
                <aside class="about-highlights">
                    <h3>Highlights</h3>
                    <ul>
                        <?php foreach ($profile['hero_highlights'] as $highlight): ?>
                            <li><?php echo htmlspecialchars($highlight); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
            </div>
        </section>

        <section id="portfolio" class="section portfolio">
            <div class="container">
                <header class="section-heading">
                    <div>
                        <p class="eyebrow">Portfolio</p>
                        <h2>Selected projects</h2>
                    </div>
                    <p class="section-summary"><?php echo htmlspecialchars($profile['summary']); ?></p>
                </header>
                <div class="project-grid">
                    <?php foreach ($projects as $project): ?>
                        <article class="project-card">
                            <figure>
                                <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?> preview">
                            </figure>
                            <div class="project-body">
                                <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                                <p><?php echo htmlspecialchars($project['summary']); ?></p>
                                <?php if (!empty($project['technologies'])): ?>
                                    <ul class="tech-list">
                                        <?php foreach ($project['technologies'] as $tech): ?>
                                            <li><?php echo htmlspecialchars($tech); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if (!empty($project['link']) && $project['link'] !== '#'): ?>
                                    <a class="project-link" href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank" rel="noopener">View project</a>
                                <?php else: ?>
                                    <span class="project-link placeholder">Add project link</span>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="experience" class="section experience">
            <div class="container">
                <header class="section-heading">
                    <p class="eyebrow">Experience</p>
                    <h2>Professional journey</h2>
                </header>
                <div class="timeline">
                    <?php foreach ($experiences as $item): ?>
                        <article class="timeline-item">
                            <header>
                                <h3><?php echo htmlspecialchars($item['role']); ?></h3>
                                <span class="company"><?php echo htmlspecialchars($item['company']); ?></span>
                                <span class="period"><?php echo htmlspecialchars($item['period']); ?></span>
                            </header>
                            <ul>
                                <?php foreach ($item['bullets'] as $bullet): ?>
                                    <li><?php echo htmlspecialchars($bullet); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="education" class="section education">
            <div class="container">
                <header class="section-heading">
                    <p class="eyebrow">Education &amp; Certificates</p>
                    <h2>Lifelong learning</h2>
                </header>
                <div class="education-grid">
                    <?php foreach ($education as $item): ?>
                        <article class="education-card">
                            <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p class="institution"><?php echo htmlspecialchars($item['institution']); ?></p>
                            <p class="period"><?php echo htmlspecialchars($item['period']); ?></p>
                            <ul>
                                <?php foreach ($item['details'] as $detail): ?>
                                    <li><?php echo htmlspecialchars($detail); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="skills" class="section skills">
            <div class="container">
                <header class="section-heading">
                    <p class="eyebrow">Skills</p>
                    <h2>Core capabilities</h2>
                </header>
                <div class="skills-grid">
                    <?php foreach ($skills as $group => $items): ?>
                        <article class="skill-card">
                            <h3><?php echo htmlspecialchars($group); ?></h3>
                            <ul>
                                <?php foreach ($items as $skill): ?>
                                    <li><?php echo htmlspecialchars($skill); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="testimonials" class="section testimonials">
            <div class="container">
                <header class="section-heading">
                    <p class="eyebrow">Testimonials</p>
                    <h2>Words from collaborators</h2>
                </header>
                <div class="testimonial-grid">
                    <?php foreach ($testimonials as $quote): ?>
                        <figure class="testimonial-card">
                            <blockquote>“<?php echo htmlspecialchars($quote['quote']); ?>”</blockquote>
                            <figcaption><?php echo htmlspecialchars($quote['author']); ?></figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($profile['name']); ?>. All rights reserved.</p>
            <a href="mailto:<?php echo htmlspecialchars($profile['email']); ?>" class="footer-link">Contact: <?php echo htmlspecialchars($profile['email']); ?></a>
        </div>
    </footer>

    <script>
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.getElementById('nav-links');
        if (navToggle && navLinks) {
            navToggle.addEventListener('click', () => {
                const expanded = navToggle.getAttribute('aria-expanded') === 'true';
                navToggle.setAttribute('aria-expanded', String(!expanded));
                navLinks.classList.toggle('open');
            });
        }
    </script>
</body>
</html>
