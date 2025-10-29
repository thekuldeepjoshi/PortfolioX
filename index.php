<?php
$meta = [
    'name' => 'Avery Stone',
    'role' => 'Full-Stack Developer',
    'tagline' => 'I build immersive digital experiences with modern stacks and thoughtful UX.',
    'location' => 'Remote · Open to relocation',
];

$projects = [
    [
        'title' => 'Nova Commerce',
        'description' => 'Headless e-commerce platform with realtime inventory, custom analytics dashboards, and modular storefront components.',
        'tags' => ['Laravel', 'Tailwind', 'Vue 3', 'Stripe'],
        'links' => [
            ['label' => 'View Case Study', 'url' => '#'],
            ['label' => 'Live Demo', 'url' => '#'],
        ],
    ],
    [
        'title' => 'PulseOps',
        'description' => 'Operations cockpit that connects warehouse sensors and logistics tools into a single actionable hub with automated alerts.',
        'tags' => ['Symfony', 'PostgreSQL', 'Redis', 'TypeScript'],
        'links' => [
            ['label' => 'Product Tour', 'url' => '#'],
            ['label' => 'GitHub', 'url' => '#'],
        ],
    ],
    [
        'title' => 'Lumina UI',
        'description' => 'A component library for marketing teams focused on accessibility and rapid prototyping with live Figma-to-code sync.',
        'tags' => ['PHP', 'Sass', 'Storybook', 'Alpine.js'],
        'links' => [
            ['label' => 'Docs', 'url' => '#'],
            ['label' => 'GitHub', 'url' => '#'],
        ],
    ],
];

function loadPortfolioGallery(string $path): array
{
    $fallback = [
        [
            'title' => 'Hero Landing Page',
            'description' => 'Spotlight a flagship screen from your product launch with a concise summary of the outcome.',
            'note' => 'Swap in a high-resolution capture and a one-sentence win.',
            'image' => 'assets/img/portfolio-placeholder-1.svg',
        ],
        [
            'title' => 'Product Dashboard',
            'description' => 'Showcase a data-dense interface or feature workflow that demonstrates depth and usability.',
            'note' => 'Highlight the audience, problem, or metric impacted.',
            'image' => 'assets/img/portfolio-placeholder-2.svg',
        ],
        [
            'title' => 'Mobile Experience',
            'description' => 'Include a responsive or native view to underline multi-device craftsmanship.',
            'note' => 'Pair with a short takeaway about accessibility or performance.',
            'image' => 'assets/img/portfolio-placeholder-3.svg',
        ],
    ];

    if (!is_readable($path)) {
        return $fallback;
    }

    $contents = file_get_contents($path);
    if ($contents === false || trim($contents) === '') {
        return $fallback;
    }

    $decoded = json_decode($contents, true);
    if (!is_array($decoded)) {
        return $fallback;
    }

    $gallery = [];
    foreach ($decoded as $entry) {
        if (!is_array($entry)) {
            continue;
        }

        $gallery[] = [
            'title' => (string)($entry['title'] ?? 'Untitled Showcase'),
            'description' => (string)($entry['description'] ?? ''),
            'note' => (string)($entry['note'] ?? ''),
            'image' => (string)($entry['image'] ?? 'assets/img/portfolio-placeholder-1.svg'),
        ];
    }

    return $gallery ?: $fallback;
}

$portfolioGallery = loadPortfolioGallery(__DIR__ . '/storage/portfolio.json');

$experience = [
    [
        'role' => 'Senior Product Engineer',
        'company' => 'Orbit Labs',
        'period' => '2021 — Present',
        'summary' => 'Leading a squad of engineers building data-rich SaaS dashboards. Spearheaded the migration to a component-driven design system and a CI/CD pipeline that reduced release time by 40%.',
    ],
    [
        'role' => 'Full-Stack Developer',
        'company' => 'Northwind Digital',
        'period' => '2018 — 2021',
        'summary' => 'Delivered performant marketing sites and internal tools for startups. Launched a reusable PHP microservice stack adopted across four teams.',
    ],
    [
        'role' => 'Frontend Developer',
        'company' => 'Freelance',
        'period' => '2015 — 2018',
        'summary' => 'Collaborated with designers to craft brand websites with delightful interactions, accessibility compliance, and SEO-first content strategies.',
    ],
];

$testimonials = [
    [
        'quote' => 'Avery translated fuzzy product requirements into a polished release in record time. Collaboration felt effortless.',
        'author' => 'Dana Howard · VP Product, Orbit Labs',
    ],
    [
        'quote' => 'They quickly untangled a legacy PHP codebase, introduced automated testing, and doubled our deployment cadence.',
        'author' => 'Chris Miles · CTO, Northwind Digital',
    ],
    [
        'quote' => 'From motion design to backend integrations, Avery brought every facet of our launch together beautifully.',
        'author' => 'Priya Desai · Founder, Luma Studios',
    ],
];

$socials = [
    ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/'],
    ['label' => 'GitHub', 'url' => 'https://github.com/'],
    ['label' => 'Dribbble', 'url' => 'https://dribbble.com/'],
    ['label' => 'Email', 'url' => 'mailto:hello@example.com'],
];

$storagePath = __DIR__ . '/storage/contacts.json';
$formData = [
    'name' => '',
    'email' => '',
    'message' => '',
];
$feedback = null;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = [
        'name' => trim($_POST['name'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'message' => trim($_POST['message'] ?? ''),
    ];

    if ($formData['name'] === '') {
        $errors['name'] = 'Please tell me who I am speaking with.';
    }

    if ($formData['email'] === '' || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Share a valid email so I can reach back out.';
    }

    if ($formData['message'] === '') {
        $errors['message'] = 'Let me know how I can help with a short message.';
    }

    if (!$errors) {
        if (!file_exists($storagePath)) {
            file_put_contents($storagePath, json_encode([], JSON_PRETTY_PRINT));
        }

        $existing = json_decode(file_get_contents($storagePath) ?: '[]', true);
        if (!is_array($existing)) {
            $existing = [];
        }

        $existing[] = [
            'name' => $formData['name'],
            'email' => $formData['email'],
            'message' => $formData['message'],
            'submitted_at' => date(DATE_ATOM),
        ];

        file_put_contents($storagePath, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
        $feedback = 'Thank you for reaching out! I will get back to you within two business days.';
        $formData = ['name' => '', 'email' => '', 'message' => ''];
    } else {
        $feedback = 'Something is missing — please fix the highlighted fields.';
    }
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($meta['name']); ?> · <?php echo e($meta['role']); ?></title>
    <meta name="description" content="<?php echo e($meta['tagline']); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<nav>
    <div class="container">
        <a href="#top" class="brand" id="top">⚡ <?php echo e($meta['name']); ?></a>
        <div class="links">
            <a href="#portfolio">Portfolio</a>
            <a href="#projects">Projects</a>
            <a href="#experience">Experience</a>
            <a href="#testimonials">Testimonials</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
</nav>

<header class="container hero">
    <div>
        <p><?php echo e($meta['location']); ?></p>
        <h1 class="headline">Hello, I’m <?php echo e($meta['name']); ?> — <span><?php echo e($meta['role']); ?></span></h1>
        <p><?php echo e($meta['tagline']); ?></p>
        <div class="cta">
            <a class="button primary" href="#projects">See featured work</a>
            <a class="button outline" href="#contact">Let’s collaborate</a>
        </div>
    </div>
    <div class="card">
        <h3>Quick highlights</h3>
        <p>• Shipped 30+ projects across SaaS, e-commerce, and creative tech.<br>
           • Passionate about accessible interfaces and performance budgets.<br>
           • Comfortable owning the stack from UX research to deployment.
        </p>
    </div>
</header>

<main>
    <section id="portfolio" class="container">
        <h2 class="section-title">Visual Portfolio</h2>
        <p class="section-subtitle">Drop in polished screenshots and notes from your standout launches.</p>
        <div class="portfolio-grid">
            <?php foreach ($portfolioGallery as $item): ?>
                <figure class="portfolio-card">
                    <div class="portfolio-media">
                        <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['title']); ?> placeholder image">
                    </div>
                    <figcaption class="portfolio-body">
                        <h3><?php echo e($item['title']); ?></h3>
                        <?php if ($item['description'] !== ''): ?>
                            <p><?php echo e($item['description']); ?></p>
                        <?php endif; ?>
                        <?php if ($item['note'] !== ''): ?>
                            <span><?php echo e($item['note']); ?></span>
                        <?php endif; ?>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="projects" class="container">
        <h2 class="section-title">Featured Projects</h2>
        <p class="section-subtitle">A curated selection of builds that blend delightful front-end craft with resilient backend systems.</p>
        <div class="grid projects-grid">
            <?php foreach ($projects as $project): ?>
                <article class="card">
                    <h3><?php echo e($project['title']); ?></h3>
                    <p><?php echo e($project['description']); ?></p>
                    <div class="tags">
                        <?php foreach ($project['tags'] as $tag): ?>
                            <span class="tag"><?php echo e($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="actions">
                        <?php foreach ($project['links'] as $link): ?>
                            <a href="<?php echo e($link['url']); ?>" target="_blank" rel="noopener"><?php echo e($link['label']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="experience" class="container">
        <h2 class="section-title">Experience</h2>
        <p class="section-subtitle">Over a decade crafting digital products with cross-functional teams.</p>
        <div class="timeline">
            <?php foreach ($experience as $item): ?>
                <div class="timeline-item">
                    <h4><?php echo e($item['role']); ?> · <?php echo e($item['company']); ?></h4>
                    <span><?php echo e($item['period']); ?></span>
                    <p><?php echo e($item['summary']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="testimonials" class="container">
        <h2 class="section-title">Notes from collaborators</h2>
        <p class="section-subtitle">Trusted by founders, marketers, and product leaders.</p>
        <div class="grid projects-grid">
            <?php foreach ($testimonials as $testimonial): ?>
                <article class="card">
                    <p>“<?php echo e($testimonial['quote']); ?>”</p>
                    <p><strong><?php echo e($testimonial['author']); ?></strong></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="contact" class="container">
        <h2 class="section-title">Let’s build something</h2>
        <p class="section-subtitle">Share a bit about your project and I’ll follow up with ideas, timelines, and next steps.</p>
        <div class="grid contact-grid">
            <div class="card contact-card">
                <h3>Availability</h3>
                <p>I’m currently booking projects for Q4. For faster collaboration, include your ideal launch date and any relevant links or documents.</p>
                <div>
                    <h4>Services</h4>
                    <p>Product strategy · UI engineering · Design systems · PHP/Laravel · CMS customization · Technical audits</p>
                </div>
            </div>
            <div class="card">
                <?php if ($feedback): ?>
                    <div class="feedback"><?php echo e($feedback); ?></div>
                <?php endif; ?>
                <form method="post" novalidate>
                    <label>
                        <span>Name</span>
                        <input type="text" name="name" value="<?php echo e($formData['name']); ?>" <?php echo isset($errors['name']) ? 'aria-invalid="true"' : ''; ?> required>
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" value="<?php echo e($formData['email']); ?>" <?php echo isset($errors['email']) ? 'aria-invalid="true"' : ''; ?> required>
                    </label>
                    <label>
                        <span>Project details</span>
                        <textarea name="message" rows="5" <?php echo isset($errors['message']) ? 'aria-invalid="true"' : ''; ?> required><?php echo e($formData['message']); ?></textarea>
                    </label>
                    <button class="button primary" type="submit">Send message</button>
                </form>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>© <?php echo date('Y'); ?> <?php echo e($meta['name']); ?>. Let’s create something extraordinary.</p>
    <div class="socials">
        <?php foreach ($socials as $social): ?>
            <a href="<?php echo e($social['url']); ?>" target="_blank" rel="noopener"><?php echo e($social['label']); ?></a>
        <?php endforeach; ?>
    </div>
</footer>

<script src="assets/js/main.js" defer></script>
</body>
</html>
