<?php

declare(strict_types=1);

function e(?string $value): string
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

function render_nav(array $identity): void
{
    $sections = [
        ['id' => 'about', 'label' => 'About'],
        ['id' => 'experience', 'label' => 'Experience'],
        ['id' => 'skills', 'label' => 'Skills'],
        ['id' => 'education', 'label' => 'Education'],
        ['id' => 'contact', 'label' => 'Contact'],
    ];
    ?>
    <nav>
        <div class="container nav-bar">
            <a href="#top" class="brand">⚡ <?php echo e($identity['name'] ?? ''); ?></a>
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
                <span>Menu</span>
            </button>
            <div class="links" id="primary-navigation">
                <?php foreach ($sections as $section): ?>
                    <a href="#<?php echo e($section['id']); ?>"><?php echo e($section['label']); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>
    <?php
}

function render_hero(array $content): void
{
    $identity = $content['identity'] ?? [];
    $highlights = $content['highlights'] ?? [];
    $metrics = $content['metrics'] ?? [];
    $contact = $content['contact'] ?? [];
    ?>
    <header id="top" class="hero section">
        <div class="container hero-layout">
            <div class="hero-content">
                <span class="eyebrow"><?php echo e($identity['title'] ?? ''); ?></span>
                <h1 class="headline"><?php echo e($identity['name'] ?? ''); ?></h1>
                <?php if (!empty($identity['summary'])): ?>
                    <p class="tagline"><?php echo e($identity['summary']); ?></p>
                <?php endif; ?>
                <?php if (!empty($identity['bio'])): ?>
                    <p class="hero-summary"><?php echo e($identity['bio']); ?></p>
                <?php endif; ?>
                <?php if ($highlights): ?>
                    <ul class="hero-highlights">
                        <?php foreach ($highlights as $highlight): ?>
                            <li><?php echo e($highlight); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="cta">
                    <a class="button primary" href="#contact">Start a conversation</a>
                    <?php if (!empty($contact['linkedin'])): ?>
                        <a class="button outline" href="<?php echo e($contact['linkedin']); ?>" target="_blank" rel="noopener">
                            Connect on LinkedIn
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="hero-media">
                <div class="hero-frame">
                    <img src="assets/images/hero-portrait.svg" alt="Illustration of <?php echo e($identity['name'] ?? ''); ?>" loading="lazy">
                    <?php if (!empty($identity['contact_cta'])): ?>
                        <div class="hero-availability">
                            <span class="status-dot" aria-hidden="true"></span>
                            <span><?php echo e($identity['contact_cta']); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($metrics): ?>
                    <div class="metrics-grid">
                        <?php foreach ($metrics as $metric): ?>
                            <div class="metric-card">
                                <span class="metric-value"><?php echo e($metric['value']); ?></span>
                                <p><?php echo e($metric['label']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($identity['location'])): ?>
                    <p class="location">📍 <?php echo e($identity['location']); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <?php
}

function render_overview(array $content): void
{
    $highlights = $content['highlights'] ?? [];
    $skillCategories = array_keys($content['skills'] ?? []);
    $techFocus = [];
    foreach ($content['experience'] ?? [] as $experience) {
        if (!empty($experience['technologies']) && is_array($experience['technologies'])) {
            $techFocus = array_values(array_unique(array_merge($techFocus, $experience['technologies'])));
        }
    }
    ?>
    <section id="about" class="section alt">
        <div class="container">
            <h2 class="section-title">About</h2>
            <p class="section-subtitle">Strategic engineering leadership with a cloud-native backbone.</p>
            <div class="grid overview-grid">
                <article class="card overview-card">
                    <h3>Leadership snapshot</h3>
                    <?php if (!empty($content['summary'])): ?>
                        <p class="overview-text"><?php echo e($content['summary']); ?></p>
                    <?php endif; ?>
                    <?php if ($highlights): ?>
                        <ul class="spotlight-list">
                            <?php foreach ($highlights as $highlight): ?>
                                <li><?php echo e($highlight); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </article>
                <article class="card overview-card">
                    <h3>Focus & toolkit</h3>
                    <?php if ($skillCategories): ?>
                        <div class="focus-chips">
                            <?php foreach ($skillCategories as $category): ?>
                                <span class="chip"><?php echo e($category); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($techFocus): ?>
                        <div class="tech-badges">
                            <?php foreach ($techFocus as $tech): ?>
                                <span class="badge"><?php echo e($tech); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </article>
            </div>
        </div>
    </section>
    <?php
}

function render_experience(array $experience): void
{
    ?>
    <section id="experience" class="section">
        <div class="container">
            <h2 class="section-title">Experience</h2>
            <p class="section-subtitle">Guiding fintech and logistics teams to deliver resilient, human-centered platforms.</p>
            <div class="timeline">
                <?php foreach ($experience as $role): ?>
                    <article class="timeline-item card">
                        <div class="timeline-header">
                            <h4><?php echo e($role['role'] ?? ''); ?> · <?php echo e($role['company'] ?? ''); ?></h4>
                            <span><?php echo e($role['period'] ?? ''); ?></span>
                        </div>
                        <?php if (!empty($role['location'])): ?>
                            <span class="location-chip"><?php echo e($role['location']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($role['summary'])): ?>
                            <p><?php echo e($role['summary']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($role['achievements'])): ?>
                            <ul class="timeline-highlights">
                                <?php foreach ($role['achievements'] as $achievement): ?>
                                    <li><?php echo e($achievement); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (!empty($role['technologies'])): ?>
                            <div class="tech-badges">
                                <?php foreach ($role['technologies'] as $tech): ?>
                                    <span class="badge"><?php echo e($tech); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($role['subroles'])): ?>
                            <div class="subrole">
                                <?php foreach ($role['subroles'] as $subrole): ?>
                                    <h5><?php echo e($subrole['role'] ?? ''); ?> · <?php echo e($subrole['company'] ?? ''); ?> <span><?php echo e($subrole['period'] ?? ''); ?></span></h5>
                                    <?php if (!empty($subrole['achievements'])): ?>
                                        <ul class="timeline-highlights compact">
                                            <?php foreach ($subrole['achievements'] as $achievement): ?>
                                                <li><?php echo e($achievement); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function render_skills(array $skills): void
{
    ?>
    <section id="skills" class="section alt">
        <div class="container">
            <h2 class="section-title">Skills & Expertise</h2>
            <p class="section-subtitle">Combining technical architecture with people-first leadership.</p>
            <div class="grid skills-grid">
                <?php foreach ($skills as $category => $items): ?>
                    <article class="card skill-category">
                        <h3><?php echo e($category); ?></h3>
                        <ul>
                            <?php foreach ($items as $item): ?>
                                <li><?php echo e($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function render_education(array $education, array $certificates): void
{
    ?>
    <section id="education" class="section">
        <div class="container">
            <h2 class="section-title">Education & Certifications</h2>
            <p class="section-subtitle">Formal training that strengthens strategic thinking and delivery rigor.</p>
            <div class="grid education-grid">
                <article class="card">
                    <h3>Education</h3>
                    <ul class="education-list">
                        <?php foreach ($education as $entry): ?>
                            <li>
                                <strong><?php echo e($entry['degree'] ?? ''); ?></strong>
                                <span><?php echo e($entry['institution'] ?? ''); ?></span>
                                <span class="year"><?php echo e($entry['year'] ?? ''); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </article>
                <article class="card">
                    <h3>Certificates</h3>
                    <ul class="certificate-list">
                        <?php foreach ($certificates as $certificate): ?>
                            <li><?php echo e($certificate); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </div>
        </div>
    </section>
    <?php
}

function render_contact(
    array $contact,
    array $identity,
    array $formData,
    array $errors,
    ?string $feedback
): void {
    ?>
    <section id="contact" class="section">
        <div class="container">
            <h2 class="section-title">Let’s collaborate</h2>
            <p class="section-subtitle"><?php echo e($identity['contact_cta'] ?? 'Reach out and let’s build something impactful.'); ?></p>
            <div class="grid contact-grid">
                <article class="card contact-card">
                    <h3>Direct contact</h3>
                    <p>I’m always interested in discussing engineering leadership, platform modernization, and mentorship opportunities.</p>
                    <ul class="contact-methods">
                        <?php if (!empty($contact['email'])): ?>
                            <li><a href="mailto:<?php echo e($contact['email']); ?>"><?php echo e($contact['email']); ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($contact['linkedin'])): ?>
                            <li><a href="<?php echo e($contact['linkedin']); ?>" target="_blank" rel="noopener">LinkedIn</a></li>
                        <?php endif; ?>
                        <?php if (!empty($contact['github'])): ?>
                            <li><a href="<?php echo e($contact['github']); ?>" target="_blank" rel="noopener">GitHub</a></li>
                        <?php endif; ?>
                    </ul>
                    <p class="contact-note">Prefer async updates? Drop a note and I’ll respond within two business days.</p>
                </article>
                <article class="card">
                    <h3>Send a message</h3>
                    <?php if ($feedback): ?>
                        <div class="feedback"><?php echo e($feedback); ?></div>
                    <?php endif; ?>
                    <form action="#contact" method="post" novalidate>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo e($formData['name']); ?>" <?php echo isset($errors['name']) ? 'class="error"' : ''; ?>>
                        <?php if (isset($errors['name'])): ?>
                            <span class="error-text"><?php echo e($errors['name']); ?></span>
                        <?php endif; ?>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo e($formData['email']); ?>" <?php echo isset($errors['email']) ? 'class="error"' : ''; ?>>
                        <?php if (isset($errors['email'])): ?>
                            <span class="error-text"><?php echo e($errors['email']); ?></span>
                        <?php endif; ?>

                        <label for="message">How can I help?</label>
                        <textarea id="message" name="message" <?php echo isset($errors['message']) ? 'class="error"' : ''; ?>><?php echo e($formData['message']); ?></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <span class="error-text"><?php echo e($errors['message']); ?></span>
                        <?php endif; ?>

                        <button class="button primary" type="submit">Share your idea</button>
                    </form>
                </article>
            </div>
        </div>
    </section>
    <?php
}

function render_footer(array $identity, array $contact): void
{
    $socials = [];
    if (!empty($contact['linkedin'])) {
        $socials[] = ['label' => 'LinkedIn', 'url' => $contact['linkedin']];
    }
    if (!empty($contact['github'])) {
        $socials[] = ['label' => 'GitHub', 'url' => $contact['github']];
    }
    if (!empty($contact['email'])) {
        $socials[] = ['label' => 'Email', 'url' => 'mailto:' . $contact['email']];
    }
    ?>
    <footer>
        <div class="container">
            <p>© <?php echo date('Y'); ?> <?php echo e($identity['name'] ?? ''); ?>. All rights reserved.</p>
            <?php if ($socials): ?>
                <div class="socials">
                    <?php foreach ($socials as $social): ?>
                        <a href="<?php echo e($social['url']); ?>" target="_blank" rel="noopener"><?php echo e($social['label']); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </footer>
    <?php
}
