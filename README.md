# WordPress Theme Build Template

A modern WordPress theme build system with automated versioning, releases, and GitHub Actions.

## Features

-   **Modern Build System**: webpack via @wordpress/scripts
-   **Automated Versioning**: semantic versioning with standard-version
-   **GitHub Actions**: automated releases on git tag push
-   **GitHub Updates**: Automatic theme updates via GitHub releases
-   **Code Quality**: PHP_CodeSniffer with WordPress Coding Standards
-   **SCSS Compilation**: Dart Sass with webpack
-   **Development Mode**: Hot reload with watch mode

## Prerequisites

-   Node.js 20+ and npm
-   PHP 8.0+
-   Composer
-   Git

## Quick Start

### 1. Find and Replace theme slug

**Replace `theme-slug` with your actual theme slug in ALL files.**

The easiest way is using find and replace in your editor (VS Code, PHPStorm, etc.):

**Search for:** `theme-slug`
**Replace with:** `your-theme-slug` (e.g., `evofitness`, `client-theme`, etc.)

This will update:

-   `package.json` → `"name": "theme-slug"`
-   `package.json` → `"url": "...theme-slug.git"`
-   `composer.json` → `"name": "your-vendor/theme-slug"`
-   `style.css` → `Text Domain: theme-slug`
-   `phpcs.xml.dist` → `<element value="theme-slug"/>`

### 2. Install dependencies

```bash
npm install
composer install
```

### 3. Initialize Git

```bash
git init
git add .
git commit -m "chore: initial commit"
git remote add origin https://github.com/your-username/your-theme-slug.git
git branch -M main
git push -u origin main
```

## Development

```bash
npm start          # Development with watch mode
npm run build      # Production build

npm run lint:js    # Lint JavaScript
npm run lint:css   # Lint CSS/SCSS
composer phpcbf    # Auto-fix PHP formatting
composer phpcs     # Check PHP code standards
```

## Releases

Uses [Conventional Commits](https://www.conventionalcommits.org/) for automated versioning.

### Commit format

```bash
git commit -m "feat: add new feature"    # Minor bump
git commit -m "fix: resolve bug"         # Patch bump
git commit -m "chore: update deps"       # No bump
```

### Create release

```bash
npm run release        # Auto-detect version bump
npm run release:patch  # 1.0.0 → 1.0.1
npm run release:minor  # 1.0.0 → 1.1.0
npm run release:major  # 1.0.0 → 2.0.0

git push --follow-tags # Trigger GitHub Actions
```

GitHub Actions automatically builds and publishes a `.zip` release.

## What's included?

```
src/js/index.js     → build/js/build.js       (webpack)
src/scss/index.scss → build/css/build.css     (dart-sass)
```

**Theme structure:**

-   `functions.php` - Main theme file
-   `includes/theme-setup.php` - WordPress theme setup
-   `includes/theme-updater.php` - GitHub automatic updates
-   `vendor/` - Composer dependencies (GitHub Updater)

**Release `.zip` includes:**

-   All PHP files
-   `build/` directory (compiled assets)
-   `vendor/` directory (runtime dependencies)
-   `style.css`

**Release `.zip` excludes:**

-   `node_modules/`, `src/`
-   Config files (package.json, composer.json, etc.)

See `.distignore` for full exclusion list.

## GitHub Updates

The theme includes automatic update support via GitHub releases.

After setup, edit `includes/theme-updater.php`:

1. Update the GitHub repository URL
2. For private repos, add a GitHub token (see comments in file)

When you create a release (via `npm run release`), users will receive automatic updates in WordPress admin.

## Documentation

-   **SETUP-CHECKLIST.md** - Quick setup reference
-   **Conventional Commits** - https://www.conventionalcommits.org/
-   **WordPress Coding Standards** - https://developer.wordpress.org/coding-standards/

## License

This template is provided as-is for use in your projects.
