<?php
$meta = [
    'name' => 'Kuldeep Joshi',
    'role' => 'Engineering Manager',
    'tagline' => 'Engineering leader with 10+ years orchestrating resilient platforms, empowering teams, and shipping outcomes that matter.',
    'location' => 'Dublin, Ireland',
    'availability' => 'Available for transformation and advisory engagements starting Q3 2024.',
    'eyebrow' => 'Engineering leadership · Platform modernization · Team enablement',
];

$highlights = [
    'Scaled multi-region platforms supporting 50M+ users while sustaining 99.97% uptime.',
    'Coached and grew 45+ engineers into empowered product squads with measurable OKRs.',
    'Partnered with product and design to deliver customer wins within an eight-week cadence.',
];

$metrics = [
    ['value' => '10+', 'label' => 'Years building and leading engineering orgs'],
    ['value' => '45+', 'label' => 'Engineers coached across platform teams'],
    ['value' => '63%', 'label' => 'Deployment lead-time reduction'],
];

$initiatives = [
    [
        'title' => 'Next-gen payments modernization',
        'description' => 'Migrated a legacy monolith into domain-driven services with automated guardrails, enabling weekly global payment releases.',
        'impact' => 'Improved transaction success rate from 92% to 99.4% within two quarters.',
        'focus' => 'Service decomposition · Observability · Change management',
        'image' => 'assets/images/initiative-modernization.svg',
        'links' => [
            ['label' => 'Modernization playbook', 'url' => '#'],
        ],
    ],
    [
        'title' => 'Reliability command center',
        'description' => 'Established an SRE program with unified alerting, runbooks, and executive-level incident review rituals.',
        'impact' => 'Reduced critical incidents by 48% and mean-time-to-detect to under 4 minutes.',
        'focus' => 'SRE charter · Platform observability · Executive reporting',
        'image' => 'assets/images/initiative-observability.svg',
        'links' => [
            ['label' => 'See operating model', 'url' => '#'],
        ],
    ],
    [
        'title' => 'People-first delivery culture',
        'description' => 'Introduced squad health checks, mentorship programs, and skill matrices that fuel continuous growth and retention.',
        'impact' => 'Unlocked 94% retention and doubled cross-team collaboration scores.',
        'focus' => 'Talent development · Empowered squads · Psychological safety',
        'image' => 'assets/images/initiative-culture.svg',
        'links' => [
            ['label' => 'Read the culture guide', 'url' => '#'],
        ],
    ],
];

$pillars = [
    [
        'icon' => '🤝',
        'title' => 'People-first leadership',
        'description' => 'Blend coaching, 1:1 frameworks, and career mapping to build teams that feel supported and ready to own outcomes.',
    ],
    [
        'icon' => '🧭',
        'title' => 'Clarity through strategy',
        'description' => 'Translate company goals into measurable roadmaps, ensuring squads ship iteratively with aligned expectations.',
    ],
    [
        'icon' => '🚀',
        'title' => 'Delivery with trust',
        'description' => 'Introduce automation, observability, and rituals that help teams deliver safely and celebrate learning.',
    ],
];

$experience = [
    [
        'role' => 'Director of Engineering',
        'company' => 'BrightScale Platforms',
        'period' => '2021 — Present',
        'summary' => 'Guided four product-aligned squads across payments and risk, co-owning product strategy with the CPO.',
        'highlights' => [
            'Launched a multi-region payments stack that processed $4B+ annually.',
            'Built an internal engineering leadership program with 12 new managers.',
        ],
    ],
    [
        'role' => 'Engineering Manager',
        'company' => 'Skybound Systems',
        'period' => '2016 — 2021',
        'summary' => 'Led platform and experience teams delivering SaaS solutions for enterprise logistics and fintech clients.',
        'highlights' => [
            'Cut deployment lead times from monthly to daily releases.',
            'Negotiated cross-functional OKRs that improved NPS by 19 points.',
        ],
    ],
    [
        'role' => 'Technical Lead',
        'company' => 'InnovaSoft',
        'period' => '2013 — 2016',
        'summary' => 'Oversaw architecture and delivery of B2B integration platforms while mentoring senior engineers into lead roles.',
        'highlights' => [
            'Standardized code quality gates adopted across five product lines.',
            'Mentored engineers who became team leads within 18 months.',
        ],
    ],
];

$testimonials = [
    [
        'quote' => 'Kuldeep instilled calm, confidence, and velocity in our engineering organization. His leadership unlocked the outcomes product and sales had been chasing for years.',
        'author' => 'Rhea Nair · Chief Product Officer, BrightScale Platforms',
    ],
    [
        'quote' => 'He builds trust quickly, sets crisp expectations, and then empowers teams to exceed them. Our reliability transformation would not have happened without Kuldeep.',
        'author' => 'Matthew Keller · VP Engineering, Skybound Systems',
    ],
    [
        'quote' => 'From exec briefings to mentoring new managers, Kuldeep elevates the entire organization and still finds time to celebrate the wins that keep morale high.',
        'author' => 'Aditi Rana · Director of Product Design, BrightScale Platforms',
    ],
];

$recognitions = [
    [
        'title' => 'Top People Leader',
        'issuer' => 'Tech Guild Awards 2023',
        'summary' => 'Recognized for building inclusive leadership programs and measurable talent development outcomes.',
    ],
    [
        'title' => 'Keynote: Accelerating Platform Modernization',
        'issuer' => 'Cloud Native Summit 2022',
        'summary' => 'Shared the modernization roadmap that unlocked 60% faster releases for a global payments platform.',
    ],
    [
        'title' => 'Panel: Cultivating Engineering Culture at Scale',
        'issuer' => 'LeadDev New York',
        'summary' => 'Discussed rituals and feedback loops that drive clarity and engagement for distributed squads.',
    ],
];

$socials = [
    ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/kuldeep-joshi/'],
    ['label' => 'GitHub', 'url' => 'https://github.com/kuldeepjoshi'],
    ['label' => 'Medium', 'url' => 'https://medium.com/@kuldeepjoshi'],
    ['label' => 'Email', 'url' => 'mailto:hello@kuldeepjoshi.com'],
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
    <div class="container nav-bar">
        <a href="#top" class="brand">⚡ <?php echo e($meta['name']); ?></a>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation">
            <span>Menu</span>
        </button>
        <div class="links" id="primary-navigation">
            <a href="#initiatives">Initiatives</a>
            <a href="#principles">Principles</a>
            <a href="#experience">Experience</a>
            <a href="#testimonials">Testimonials</a>
            <a href="#recognition">Recognition</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
</nav>

<header id="top" class="hero section">
    <div class="container hero-layout">
        <div class="hero-content">
            <span class="eyebrow"><?php echo e($meta['eyebrow']); ?></span>
            <h1 class="headline">I’m <?php echo e($meta['name']); ?> — a <?php echo e($meta['role']); ?> who turns vision into measurable delivery.</h1>
            <p class="tagline"><?php echo e($meta['tagline']); ?></p>
            <ul class="hero-highlights">
                <?php foreach ($highlights as $highlight): ?>
                    <li><?php echo e($highlight); ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="cta">
                <a class="button primary" href="#initiatives">Explore my impact</a>
                <a class="button outline" href="#contact">Schedule a conversation</a>
            </div>
        </div>
        <div class="hero-media">
            <div class="hero-frame">
                <img src="assets/images/hero-portrait.svg" alt="Illustrated portrait of <?php echo e($meta['name']); ?>" loading="lazy">
                <div class="hero-availability">
                    <span class="status-dot" aria-hidden="true"></span>
                    <span><?php echo e($meta['availability']); ?></span>
                </div>
            </div>
            <div class="metrics-grid">
                <?php foreach ($metrics as $metric): ?>
                    <div class="metric-card">
                        <span class="metric-value"><?php echo e($metric['value']); ?></span>
                        <p><?php echo e($metric['label']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="location">Based in <?php echo e($meta['location']); ?></p>
        </div>
    </div>
</header>

<main>
    <section id="initiatives" class="section">
        <div class="container">
            <h2 class="section-title">Featured initiatives</h2>
            <p class="section-subtitle">Programs where I partnered with teams to ship resilient platforms, confident teams, and measurable value.</p>
            <div class="grid initiatives-grid">
                <?php foreach ($initiatives as $initiative): ?>
                    <article class="card initiative-card">
                        <div class="initiative-media">
                            <img src="<?php echo e($initiative['image']); ?>" alt="<?php echo e($initiative['title']); ?> illustration" loading="lazy">
                        </div>
                        <div class="initiative-content">
                            <h3><?php echo e($initiative['title']); ?></h3>
                            <p><?php echo e($initiative['description']); ?></p>
                            <ul class="initiative-stats">
                                <li><strong>Impact:</strong> <?php echo e($initiative['impact']); ?></li>
                                <li><strong>Focus:</strong> <?php echo e($initiative['focus']); ?></li>
                            </ul>
                            <div class="actions">
                                <?php foreach ($initiative['links'] as $link): ?>
                                    <a href="<?php echo e($link['url']); ?>" target="_blank" rel="noopener"><?php echo e($link['label']); ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="principles" class="section alt">
        <div class="container">
            <h2 class="section-title">Leadership principles</h2>
            <p class="section-subtitle">What it feels like to build alongside me — clarity, trust, and empowered teams delivering with purpose.</p>
            <div class="grid pillars-grid">
                <?php foreach ($pillars as $pillar): ?>
                    <article class="card pillar-card">
                        <span class="pillar-icon" aria-hidden="true"><?php echo e($pillar['icon']); ?></span>
                        <h3><?php echo e($pillar['title']); ?></h3>
                        <p><?php echo e($pillar['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="experience" class="section">
        <div class="container">
            <h2 class="section-title">Experience</h2>
            <p class="section-subtitle">Over a decade scaling engineering organizations, modernizing platforms, and uplifting the humans behind them.</p>
            <div class="timeline">
                <?php foreach ($experience as $item): ?>
                    <div class="timeline-item">
                        <div class="timeline-header">
                            <h4><?php echo e($item['role']); ?> · <?php echo e($item['company']); ?></h4>
                            <span><?php echo e($item['period']); ?></span>
                        </div>
                        <p><?php echo e($item['summary']); ?></p>
                        <?php if (!empty($item['highlights'])): ?>
                            <ul class="timeline-highlights">
                                <?php foreach ($item['highlights'] as $point): ?>
                                    <li><?php echo e($point); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="testimonials" class="section alt">
        <div class="container">
            <h2 class="section-title">Trusted by product and engineering leaders</h2>
            <p class="section-subtitle">Partners and peers share how collaborative leadership translated into business outcomes.</p>
            <div class="grid testimonials-grid">
                <?php foreach ($testimonials as $testimonial): ?>
                    <article class="card testimonial-card">
                        <p>“<?php echo e($testimonial['quote']); ?>”</p>
                        <p class="testimonial-author"><?php echo e($testimonial['author']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="recognition" class="section">
        <div class="container">
            <h2 class="section-title">Recognition &amp; speaking</h2>
            <p class="section-subtitle">Highlights from communities that invited me to share lessons learned across leadership, delivery, and culture.</p>
            <div class="grid recognition-grid">
                <?php foreach ($recognitions as $recognition): ?>
                    <article class="card recognition-card">
                        <h3><?php echo e($recognition['title']); ?></h3>
                        <span class="recognition-issuer"><?php echo e($recognition['issuer']); ?></span>
                        <p><?php echo e($recognition['summary']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="contact" class="section alt">
        <div class="container">
            <h2 class="section-title">Let’s design your next chapter</h2>
            <p class="section-subtitle">Share a bit about your goals and I’ll reply with discovery steps, suggested timelines, and the team rituals that can help.</p>
            <div class="grid contact-grid">
                <div class="card contact-card">
                    <h3>How I can help</h3>
                    <p>Fractional engineering leadership, platform modernization programs, and hands-on coaching for new managers.</p>
                    <div>
                        <h4>Current focus</h4>
                        <p>Platform health checks · Delivery coaching · SRE enablement · Product-engineering alignment</p>
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
                            <span>How can I support you?</span>
                            <textarea name="message" rows="5" <?php echo isset($errors['message']) ? 'aria-invalid="true"' : ''; ?> required><?php echo e($formData['message']); ?></textarea>
                        </label>
                        <button class="button primary" type="submit">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>© <?php echo date('Y'); ?> <?php echo e($meta['name']); ?>. Leading teams that ship with confidence.</p>
    <div class="socials">
        <?php foreach ($socials as $social): ?>
            <a href="<?php echo e($social['url']); ?>" target="_blank" rel="noopener"><?php echo e($social['label']); ?></a>
        <?php endforeach; ?>
    </div>
</footer>

<script src="assets/js/main.js" defer></script>
</body>
</html>
