<?php
declare(strict_types=1);

$contentPath = __DIR__ . '/content/profile.json';
$content = json_decode(file_get_contents($contentPath) ?: '[]', true);

vardump($content)

if (!is_array($content) || !$content) {
    throw new RuntimeException('Unable to load portfolio content.');
}

require __DIR__ . '/includes/template.php';

$storagePath = __DIR__ . '/storage/contacts.json';
$formData = ['name' => '', 'email' => '', 'message' => ''];
$errors = [];
$feedback = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = [
        'name' => trim($_POST['name'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'message' => trim($_POST['message'] ?? ''),
    ];

    if ($formData['name'] === '') {
        $errors['name'] = 'Please share your name so I know who to follow up with.';
    }

    if ($formData['email'] === '' || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Add a valid email address so I can reply.';
    }

    if ($formData['message'] === '') {
        $errors['message'] = 'Let me know a bit about your project or question.';
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

        file_put_contents(
            $storagePath,
            json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            LOCK_EX
        );

        $feedback = 'Thanks for reaching out! I will respond within two business days.';
        $formData = ['name' => '', 'email' => '', 'message' => ''];
    } else {
        $feedback = 'Please fix the highlighted fields and try again.';
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($content['identity']['name'] ?? 'Portfolio'); ?> · <?php echo e($content['identity']['title'] ?? ''); ?></title>
    <meta name="description" content="<?php echo e($content['identity']['summary'] ?? 'Engineering leadership portfolio'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body id="top">
<?php
render_nav($content['identity']);
render_hero($content);
render_overview($content);
render_experience($content['experience'] ?? []);
render_skills($content['skills'] ?? []);
render_education($content['education'] ?? [], $content['certificates'] ?? []);
render_contact($content['contact'] ?? [], $content['identity'], $formData, $errors, $feedback);
render_footer($content['identity'], $content['contact'] ?? []);
?>
<script src="assets/js/main.js" defer></script>
</body>
</html>
