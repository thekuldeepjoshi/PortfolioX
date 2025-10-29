<?php
declare(strict_types=1);

const CONTENT_BASE_PATH = __DIR__ . '/../content';

function read_content_file(string $filename): string
{
    $path = CONTENT_BASE_PATH . '/' . ltrim($filename, '/');
    if (!is_readable($path)) {
        return '';
    }

    $contents = file_get_contents($path);
    return $contents === false ? '' : trim($contents);
}

function load_personal_profile(): array
{
    $defaults = [
        'name' => 'Your Name',
        'role' => 'Software Engineer',
        'tagline' => 'Add a concise headline or mission statement here.',
        'location' => 'City, Country',
        'summary' => 'Use this space to summarize your unique approach, current focus, or impact.',
        'about' => 'Share a longer paragraph that tells your professional story, passions, or philosophy.',
        'hero_highlights' => [
            'Highlight a flagship product or initiative you led.',
            'Mention a measurable win or metric that represents your impact.',
            'Call out a key strength such as leadership, systems thinking, or mentoring.',
        ],
        'email' => 'you@example.com',
    ];

    $raw = read_content_file('personal.txt');
    if ($raw === '') {
        return $defaults;
    }

    $parsed = [];
    foreach (preg_split('/\r?\n/', $raw) as $line) {
        if (trim($line) === '' || str_starts_with(trim($line), '#')) {
            continue;
        }

        if (!str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = array_map('trim', explode('=', $line, 2));
        if ($key === '') {
            continue;
        }
        if ($key === 'hero_highlights') {
            $parsed[$key] = array_filter(array_map('trim', preg_split('/\||,/', $value)));
        } else {
            $parsed[$key] = $value;
        }
    }

    $profile = array_merge($defaults, $parsed);
    if (!isset($profile['hero_highlights']) || !is_array($profile['hero_highlights']) || $profile['hero_highlights'] === []) {
        $profile['hero_highlights'] = $defaults['hero_highlights'];
    }

    return $profile;
}

function load_collection_entries(string $filename, callable $mapEntry): array
{
    $raw = read_content_file($filename);
    if ($raw === '') {
        return [];
    }

    $chunks = preg_split('/\n-{3,}\n/', $raw);
    $entries = [];

    foreach ($chunks as $chunk) {
        $chunk = trim($chunk);
        if ($chunk === '') {
            continue;
        }

        $result = $mapEntry($chunk);
        if ($result !== null) {
            $entries[] = $result;
        }
    }

    return $entries;
}

function load_experiences(): array
{
    $map = function (string $chunk) {
        $lines = array_values(array_filter(array_map('trim', preg_split('/\r?\n/', $chunk))));
        if ($lines === []) {
            return null;
        }

        $header = array_shift($lines);
        $parts = array_map('trim', explode('|', $header));
        $role = $parts[0] ?? 'Role Title';
        $company = $parts[1] ?? 'Company';
        $period = $parts[2] ?? 'Year — Year';
        $bullets = [];

        foreach ($lines as $line) {
            $line = ltrim($line, "-•\t ");
            if ($line !== '') {
                $bullets[] = $line;
            }
        }

        if ($bullets === []) {
            $bullets[] = 'Add a short accomplishment or responsibility here.';
        }

        return [
            'role' => $role,
            'company' => $company,
            'period' => $period,
            'bullets' => $bullets,
        ];
    };

    $items = load_collection_entries('experience.txt', $map);
    if ($items === []) {
        return [
            [
                'role' => 'Senior Software Engineer',
                'company' => 'Innovate Labs',
                'period' => '2021 — Present',
                'bullets' => [
                    'Lead cross-functional squads to ship resilient cloud platforms and developer tooling.',
                    'Champion code quality, observability, and knowledge sharing practices.',
                ],
            ],
            [
                'role' => 'Full-Stack Engineer',
                'company' => 'NextWave Studio',
                'period' => '2018 — 2021',
                'bullets' => [
                    'Designed and delivered data-rich web experiences with Laravel, Vue, and TypeScript.',
                ],
            ],
        ];
    }

    return $items;
}

function load_education_and_certificates(): array
{
    $map = function (string $chunk) {
        $lines = array_values(array_filter(array_map('trim', preg_split('/\r?\n/', $chunk))));
        if ($lines === []) {
            return null;
        }

        $header = array_shift($lines);
        $parts = array_map('trim', explode('|', $header));
        $title = $parts[0] ?? 'Program or Certificate';
        $institution = $parts[1] ?? 'Institution';
        $period = $parts[2] ?? 'Year';
        $details = $lines !== [] ? $lines : ['Add notable coursework, honors, or skills covered.'];

        return [
            'title' => $title,
            'institution' => $institution,
            'period' => $period,
            'details' => $details,
        ];
    };

    $items = load_collection_entries('education.txt', $map);
    if ($items === []) {
        return [
            [
                'title' => 'B.Sc. Computer Science',
                'institution' => 'Tech University',
                'period' => '2013 — 2017',
                'details' => ['Focus on distributed systems, human-computer interaction, and product design.'],
            ],
            [
                'title' => 'AWS Certified Solutions Architect',
                'institution' => 'Amazon Web Services',
                'period' => '2023',
                'details' => ['Validated expertise designing scalable, secure architectures on AWS.'],
            ],
        ];
    }

    return $items;
}

function load_skills(): array
{
    $raw = read_content_file('skills.txt');
    if ($raw === '') {
        return [
            'Languages' => ['PHP', 'TypeScript', 'Go'],
            'Frameworks' => ['Laravel', 'Livewire', 'React'],
            'Platforms & Tools' => ['AWS', 'Docker', 'PostgreSQL'],
        ];
    }

    $groups = [];
    foreach (preg_split('/\r?\n/', $raw) as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }
        if (!str_contains($line, ':')) {
            continue;
        }

        [$title, $items] = array_map('trim', explode(':', $line, 2));
        $groups[$title] = array_filter(array_map('trim', explode(',', $items)));
    }

    return $groups ?: [
        'Core Skills' => ['Add comma-separated skills here.'],
    ];
}

function load_testimonials(): array
{
    $map = function (string $chunk) {
        $lines = array_values(array_filter(array_map('trim', preg_split('/\r?\n/', $chunk))));
        if ($lines === []) {
            return null;
        }

        $quote = $lines[0];
        $author = $lines[1] ?? 'Name, Title';

        return [
            'quote' => trim($quote, '"'),
            'author' => $author,
        ];
    };

    $items = load_collection_entries('testimonials.txt', $map);
    if ($items === []) {
        return [
            [
                'quote' => 'A thoughtful leader who pairs system thinking with empathetic collaboration.',
                'author' => 'Product Director, Stellar Apps',
            ],
            [
                'quote' => 'Delivered complex releases with clarity, focus, and craftsmanship.',
                'author' => 'CTO, Horizon Ventures',
            ],
        ];
    }

    return $items;
}

function load_projects(): array
{
    $path = CONTENT_BASE_PATH . '/projects.json';
    if (!is_readable($path)) {
        return default_projects();
    }

    $contents = file_get_contents($path);
    if ($contents === false || trim($contents) === '') {
        return default_projects();
    }

    $decoded = json_decode($contents, true);
    if (!is_array($decoded)) {
        return default_projects();
    }

    $projects = [];
    foreach ($decoded as $project) {
        if (!is_array($project)) {
            continue;
        }

        $projects[] = [
            'title' => (string)($project['title'] ?? 'Project Title'),
            'summary' => (string)($project['summary'] ?? 'Add a one or two sentence overview.'),
            'image' => (string)($project['image'] ?? 'assets/img/project-placeholder-1.svg'),
            'technologies' => array_filter(array_map('trim', (array)($project['technologies'] ?? []))),
            'link' => (string)($project['link'] ?? '#'),
        ];
    }

    return $projects ?: default_projects();
}

function default_projects(): array
{
    return [
        [
            'title' => 'Feature Platform Redesign',
            'summary' => 'Replace this card with a flagship build. Describe the business challenge and measurable impact.',
            'image' => 'assets/img/project-placeholder-1.svg',
            'technologies' => ['Laravel', 'Livewire', 'Tailwind'],
            'link' => '#',
        ],
        [
            'title' => 'Analytics Workflow Automation',
            'summary' => 'Add a complex workflow or integration that highlights architecture depth and reliability.',
            'image' => 'assets/img/project-placeholder-2.svg',
            'technologies' => ['PHP', 'Redis', 'AWS'],
            'link' => '#',
        ],
        [
            'title' => 'Mobile Design System',
            'summary' => 'Showcase cross-platform craft with a focus on accessibility, polish, and velocity boosts.',
            'image' => 'assets/img/project-placeholder-3.svg',
            'technologies' => ['Figma', 'React Native'],
            'link' => '#',
        ],
    ];
}
