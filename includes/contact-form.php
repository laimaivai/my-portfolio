<?php
declare(strict_types=1);

// This file renders the contact form UI (fields, button, and feedback messages).

require_once __DIR__ . '/../src/csrf.php';

$contactErrors = [];
$fieldErrors = [
  'first_name' => '',
  'last_name' => '',
  'email' => '',
  'message' => '',
];
$old = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'message' => '',
];

$contactResult = (string)($_GET['contact_result'] ?? '');
$payloadRaw = (string)($_GET['contact_payload'] ?? '');

if ($payloadRaw !== '') {
    $decoded = base64_decode(urldecode($payloadRaw), true);
    if (is_string($decoded) && $decoded !== '') {
        $data = json_decode($decoded, true);
        if (is_array($data)) {
            $errors = $data['errors'] ?? [];
            $serverFieldErrors = $data['field_errors'] ?? [];
            $oldValues = $data['old'] ?? [];

            if (is_array($errors)) {
                foreach ($errors as $error) {
                    if (is_string($error) && $error !== '') {
                        $contactErrors[] = $error;
                    }
                }
            }

            if (is_array($oldValues)) {
                foreach (array_keys($old) as $key) {
                    if (isset($oldValues[$key]) && is_string($oldValues[$key])) {
                        $old[$key] = $oldValues[$key];
                    }
                }
            }

            if (is_array($serverFieldErrors)) {
              foreach (array_keys($fieldErrors) as $key) {
                if (isset($serverFieldErrors[$key]) && is_string($serverFieldErrors[$key])) {
                  $fieldErrors[$key] = $serverFieldErrors[$key];
                }
              }
            }
        }
    }
}

$currentPage = basename(parse_url((string)($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) ?: 'index.php');
if ($currentPage === '' || $currentPage === 'contact-process.php') {
    $currentPage = 'index.php';
}

if (!in_array($currentPage, ['index.php', 'project1.php'], true)) {
    $currentPage = 'index.php';
}

$showSuccessState = $contactResult === 'success';
?>

<?php if ($showSuccessState): ?>
  <div class="contact-success" data-contact-success>
    <div class="contact-success-icon-wrap" aria-hidden="true">
      <span class="contact-success-glow"></span>
      <svg class="contact-success-icon" viewBox="0 0 24 24" fill="none">
        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
        <path d="M8 12.5L10.8 15.3L16.5 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
    </div>
    <h3>Thank you for reaching out!</h3>
    <p>
      I'll respond to your message within 2-3 business days. Looking forward to connecting with
      you!
    </p>
    <a class="contact-reset-link" href="<?= htmlspecialchars($currentPage, ENT_QUOTES, 'UTF-8') ?>#contact">Send another message</a>
  </div>
<?php else: ?>
  <form class="contact-form" data-contact-form method="post" action="contact-process.php" novalidate>
    <?php if ($contactResult === 'error' && $contactErrors !== []): ?>
      <div class="form-feedback form-feedback-error" role="alert" aria-live="assertive">
        <p>Please review the following:</p>
        <ul>
          <?php foreach ($contactErrors as $error): ?>
            <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="row">
      <label class="field-group" data-field-wrapper="first_name">
        <span>First Name</span>
        <input
          type="text"
          name="first_name"
          maxlength="50"
          placeholder="Your first name"
          autocomplete="given-name"
          required
          data-field="first_name"
          data-server-error="<?= htmlspecialchars($fieldErrors['first_name'], ENT_QUOTES, 'UTF-8') ?>"
          aria-describedby="error-first-name"
          value="<?= htmlspecialchars($old['first_name'], ENT_QUOTES, 'UTF-8') ?>"
        />
        <p class="field-error" id="error-first-name" data-error-for="first_name" aria-live="polite"></p>
      </label>

      <label class="field-group" data-field-wrapper="last_name">
        <span>Last Name</span>
        <input
          type="text"
          name="last_name"
          maxlength="50"
          placeholder="Your last name"
          autocomplete="family-name"
          required
          data-field="last_name"
          data-server-error="<?= htmlspecialchars($fieldErrors['last_name'], ENT_QUOTES, 'UTF-8') ?>"
          aria-describedby="error-last-name"
          value="<?= htmlspecialchars($old['last_name'], ENT_QUOTES, 'UTF-8') ?>"
        />
        <p class="field-error" id="error-last-name" data-error-for="last_name" aria-live="polite"></p>
      </label>
    </div>

    <label class="field-group" data-field-wrapper="email">
      <span>Email</span>
      <input
        type="email"
        name="email"
        maxlength="100"
        placeholder="you@example.com"
        autocomplete="email"
        required
        inputmode="email"
        data-field="email"
        data-server-error="<?= htmlspecialchars($fieldErrors['email'], ENT_QUOTES, 'UTF-8') ?>"
        aria-describedby="error-email"
        value="<?= htmlspecialchars($old['email'], ENT_QUOTES, 'UTF-8') ?>"
      />
      <p class="field-error" id="error-email" data-error-for="email" aria-live="polite"></p>
    </label>

    <label class="field-group message" data-field-wrapper="message">
      <span>Message</span>
      <textarea
        name="message"
        rows="8"
        maxlength="1000"
        required
        placeholder="Write your message"
        data-field="message"
        data-server-error="<?= htmlspecialchars($fieldErrors['message'], ENT_QUOTES, 'UTF-8') ?>"
        aria-describedby="error-message"
      ><?= htmlspecialchars($old['message'], ENT_QUOTES, 'UTF-8') ?></textarea>
      <p class="field-error" id="error-message" data-error-for="message" aria-live="polite"></p>
    </label>

    <input type="hidden" name="return_to" value="<?= htmlspecialchars($currentPage, ENT_QUOTES, 'UTF-8') ?>" />
    <?php csrf_field(); ?>

    <button class="btn contact-submit" type="submit">
      <span class="btn-label">Send Message</span>
      <span class="btn-loading" aria-hidden="true">
        <span class="btn-spinner"></span>
        <span>Sending...</span>
      </span>
    </button>
  </form>
<?php endif; ?>
