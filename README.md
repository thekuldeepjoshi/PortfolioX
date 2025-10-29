# PortfolioX

A modern, responsive portfolio template with a PHP backend contact form. Update the configuration arrays at the top of `index.php` with your personal details to launch quickly.

## Features

- Elegant landing page sections for projects, experience, testimonials, and contact
- PHP-driven content arrays for easy customization without editing HTML structure
- Progressive enhancement with smooth scrolling and section reveal animations
- Contact form persists submissions to `storage/contacts.json`

## Getting started locally

```bash
php -S localhost:8000
```

Visit `http://localhost:8000` in your browser. The built-in PHP server will handle form submissions automatically.

## Deploying for free

1. **Render.com** – Create a free web service, connect this repository, and select the PHP runtime. Use the start command `php -S 0.0.0.0:10000` and expose port `10000`.
2. **Railway.app** – Launch a new project from GitHub and pick the PHP template. Set the start command to `php -S 0.0.0.0:8000` and map port `8000`.
3. **InfinityFree** – Upload the project via FTP or the file manager. Make sure `index.php` is at the web root and `storage/` is writable (chmod `755`).

For each platform, remember to:

- Point DNS or use the generated subdomain they provide
- Configure environment variables if you introduce email integrations later
- Regularly download `storage/contacts.json` or connect an external database for long-term storage

## Customization tips

- Replace the placeholder project links with live URLs
- Extend the `$projects`, `$experience`, and `$testimonials` arrays in `index.php`
- Adjust colors and typography in `assets/css/styles.css`
- Swap Google Fonts in the `<head>` element for your brand typography
