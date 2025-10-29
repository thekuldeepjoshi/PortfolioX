# PortfolioX

A clean PHP-based portfolio template that separates content from presentation so you can update your story without touching the layout.

## Structure

- `index.php` – renders the portfolio by reading simple text files in the `content/` directory.
- `app/content_loader.php` – helper functions that parse the text files and provide sensible fallbacks.
- `assets/css/style.css` – styling for the layout. White is the primary color with blue and gold accents.
- `assets/img/` – generated SVG placeholders you can replace with your own visuals.
- `content/` – plain-text files you can edit to update the site copy and data.

## Updating your information

1. Edit the files in `content/` using any text editor.
   - `personal.txt` holds your hero text, highlights, and contact email.
   - `experience.txt`, `education.txt`, `skills.txt`, and `testimonials.txt` store the remaining sections using straightforward formats documented at the top of each file.
   - `projects.json` lists portfolio items; update titles, summaries, tech stacks, and image paths as needed.
2. Replace the SVG placeholders in `assets/img/` with your own imagery or adjust the JSON entries to point to uploaded assets.
3. Deploy the site to any PHP-capable host or use the included `Dockerfile` for a containerized setup.

## Local preview

You can run PHP's built-in server for a quick preview:

```bash
php -S localhost:8000
```

Then visit http://localhost:8000 in your browser.

## License

MIT
