<?php
declare(strict_types=1);

// This file handles form submission (security check, validation, save, and redirect).

require_once __DIR__ . '/src/csrf.php';
require_once __DIR__ . '/src/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}

$input = [
    'first_name' => trim((string)($_POST['first_name'] ?? '')),
    'last_name' => trim((string)($_POST['last_name'] ?? '')),
    'email' => filter_var(trim((string)($_POST['email'] ?? '')), FILTER_SANITIZE_EMAIL),
    'message' => trim((string)($_POST['message'] ?? '')),
];

$errors = [];
$fieldErrors = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'message' => '',
];

$namePattern = "/^[\\p{L}\\s'\-]+$/u";

if (!csrf_is_valid($_POST['csrf_token'] ?? null)) {
    $errors[] = 'Security check failed. Please refresh the page and try again.';
}

if ($input['first_name'] === '') {
    $fieldErrors['first_name'] = 'Please enter your first name';
} elseif (mb_strlen($input['first_name']) < 2) {
    $fieldErrors['first_name'] = 'First name should be at least 2 characters';
} elseif (mb_strlen($input['first_name']) > 50) {
    $fieldErrors['first_name'] = 'First name is too long (max 50 characters)';
} elseif (!preg_match($namePattern, $input['first_name'])) {
    $fieldErrors['first_name'] = 'Please use only letters, spaces, hyphens, and apostrophes';
}

if ($input['last_name'] === '') {
    $fieldErrors['last_name'] = 'Please enter your last name';
} elseif (mb_strlen($input['last_name']) < 2) {
    $fieldErrors['last_name'] = 'Last name should be at least 2 characters';
} elseif (mb_strlen($input['last_name']) > 50) {
    $fieldErrors['last_name'] = 'Last name is too long (max 50 characters)';
} elseif (!preg_match($namePattern, $input['last_name'])) {
    $fieldErrors['last_name'] = 'Please use only letters, spaces, hyphens, and apostrophes';
}

if ($input['email'] === '') {
    $fieldErrors['email'] = 'Please enter your email address';
} elseif (mb_strlen($input['email']) > 100) {
    $fieldErrors['email'] = 'Email is too long (max 100 characters)';
} elseif (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    $fieldErrors['email'] = 'Please enter a valid email address (e.g., name@example.com)';
}

if ($input['message'] === '') {
    $fieldErrors['message'] = 'Please write a message';
} elseif (mb_strlen($input['message']) < 10) {
    $fieldErrors['message'] = 'Your message is a bit short. Please add a few more details (at least 10 characters)';
} elseif (mb_strlen($input['message']) > 1000) {
    $fieldErrors['message'] = 'Your message is too long. Please keep it under 1000 characters';
}

foreach ($fieldErrors as $fieldError) {
    if ($fieldError !== '') {
        $errors[] = $fieldError;
    }
}

$returnTo = (string)($_POST['return_to'] ?? 'index.php');
$returnPath = parse_url($returnTo, PHP_URL_PATH);
$allowedPaths = ['index.php', 'project1.php'];

if (!is_string($returnPath) || !in_array(ltrim($returnPath, '/'), $allowedPaths, true)) {
    $returnPath = 'index.php';
}

$redirectBase = ltrim($returnPath, '/');

if ($errors !== []) {
    $payload = [
        'errors' => $errors,
        'field_errors' => $fieldErrors,
        'old' => $input,
    ];

    $encoded = urlencode(base64_encode(json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?: ''));
    header('Location: ' . $redirectBase . '?contact_result=error&contact_payload=' . $encoded . '#contact');
    exit;
}

try {
    $pdo = getPDO();
    $stmt = $pdo->prepare(
        "INSERT INTO contact_messages (first_name, last_name, email, message) VALUES (:first_name, :last_name, :email, :message)"
    );
    $stmt->execute([
        'first_name' => $input['first_name'],
        'last_name'  => $input['last_name'],
        'email'      => $input['email'],
        'message'    => $input['message'],
    ]);

    $to = 'laima@lvainina.eu';
    $subject = '[lvainina.eu] New message from ' . $input['first_name'] . ' ' . $input['last_name'];
    $body = "New contact form message:\r\n\r\n"
          . "================================\r\n"
          . "Name: " . $input['first_name'] . " " . $input['last_name'] . "\r\n"
          . "Email: " . $input['email'] . "\r\n"
          . "================================\r\n\r\n"
          . "Message:\r\n" . $input['message'] . "\r\n\r\n"
          . "================================\r\n"
          . "Sent: " . date("d.m.Y H:i:s") . "\r\n";
    $headers = "MIME-Version: 1.0\r\n"
             . "Content-Type: text/plain; charset=UTF-8\r\n"
             . "From: lvainina.eu <noreply@lvainina.eu>\r\n"
             . "Reply-To: " . $input['first_name'] . " " . $input['last_name'] . " <" . $input['email'] . ">";

    @mail($to, $subject, $body, $headers);

    header('Location: ' . $redirectBase . '?contact_result=success#contact');
    exit;
} catch (Throwable $e) {
    $payload = [
        'errors'       => ['Something went wrong while saving your message. Please try again later.'],
        'field_errors' => $fieldErrors,
        'old'          => $input,
    ];

    $encoded = urlencode(base64_encode(json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?: ''));
    header('Location: ' . $redirectBase . '?contact_result=error&contact_payload=' . $encoded . '#contact');
    exit;
}
