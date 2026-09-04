# TravelConnect

TravelConnect is a Laravel marketplace connecting travelers with verified travel agencies. Travelers can discover agencies, search by destination or specialty, save agencies, contact them, and submit moderated ratings and reviews.

## Current features

- Traveler registration, login, logout, and profile photo upload
- Traveler dashboard with live saved-agency, inquiry, and review data
- Verified agency directory with popular-agency ranking
- Search by agency name, description, destination, or service
- Default directory shows the three most popular verified agencies
- Country searches return every matching verified agency
- Save and unsave agencies with persistent database state
- Saved Agencies page with agency images, ratings, and all destinations
- Agency detail pages with multiple destinations, trust signals, ratings, and reviews
- Traveler review submission with 1-5 rating, comment validation, and pending moderation
- English/French locale switching using the `?lang=en` or `?lang=fr` query parameter
- Responsive account shell with mobile navigation and persistent light/dark theme

## Technology

- PHP 8.3+
- Laravel 13
- MySQL (configured through `.env`)
- Blade views
- Tailwind CSS 4
- Vite
- PHPUnit

## Requirements

Install PHP, Composer, Node.js, and npm. Verify PHP and Composer:

```powershell
php -v
composer -V
node -v
npm -v
```

## Installation

From the project root:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
npm install
```

Configure the database in `.env`, then run migrations and seed demo data:

```powershell
php artisan migrate --seed
```

Build frontend assets:

```powershell
npm run build
```

Start the application:

```powershell
php artisan serve --host=127.0.0.1 --port=8000
```

Open `http://127.0.0.1:8000`.

## Development commands

Run the Vite watcher in a second terminal when actively editing frontend files:

```powershell
npm run dev
```

Clear compiled configuration and views when debugging stale output:

```powershell
php artisan optimize:clear
php artisan view:cache
```

## Tests and validation

Run the complete suite:

```powershell
php artisan test
```

Run the main traveler workflow tests:

```powershell
php artisan test tests/Feature/TravelerDashboardTest.php
```

The frontend production build is:

```powershell
npm run build
```

## Application structure

- `app/Models`: User, Agency, Favorite, Review, Inquiry, and related Eloquent models
- `app/Http/Controllers`: authentication, favorite, and review actions
- `app/Http/Middleware/SetLocale.php`: validates and stores the active locale
- `routes/web.php`: web routes and current agency directory data
- `resources/views/components/account-shell.blade.php`: authenticated navigation shell, theme toggle, and header search
- `resources/views/components/agency-card.blade.php`: reusable agency card
- `resources/views/auth`: traveler dashboard, saved agencies, activity, and settings pages
- `resources/views/agency-show.blade.php`: agency profile and review experience
- `resources/css/app.css`: theme, responsive, and account UI rules
- `resources/js/app.js`: locale-preserving navigation, favorites, carousels, and UI interactions
- `database/migrations`: database schema
- `database/seeders/DatabaseSeeder.php`: local demo agencies, travelers, reviews, and inquiries
- `lang/en/messages.php` and `lang/fr/messages.php`: translated UI strings

## Important behavior

### Search

The account header search submits to the agency directory. It searches agency name, description, linked countries, and linked services. Empty searches show the three popular agencies; searches show all matching verified agencies.

### Favorites

The heart button calls `POST /agencies/{slug}/favorite`. It requires an authenticated traveler, uses the unique `favorites` relationship, and returns JSON with the new `saved` state. The UI is initialized from the database on every page load.

### Reviews

Travelers submit reviews through `POST /agencies/{slug}/reviews`. New reviews are stored as `pending`; only published reviews affect the public rating summary. The submitting traveler sees a pending-approval notice.

### Localization

Use `?lang=en` or `?lang=fr`. `SetLocale` validates the value, applies it to the request, and stores it in the session. Language links are excluded from the generic locale-preservation handler and navigate directly.

### Theme

The account theme is stored in browser `localStorage` under `travelconnect-dashboard-theme`. Dark-mode rules are scoped to account surfaces, cards, forms, badges, and review panels. Mobile keeps Theme and EN/FR visible until the search field receives focus.

## Demo data

The seeder creates verified agencies including Atlas Horizon Voyages, Lumiere Routes, Northstar Escapes, Sirocco Travel House, and Blue Fern Expeditions. It also creates traveler accounts, agency owners, destinations, services, inquiries, reviews, favorites, and trust-score records.

Factory-created user passwords default to `password` for local testing. Never use seeded credentials in production.

## Continuing the project

1. Keep business logic in controllers/models rather than Blade views.
2. Add feature tests for every new authenticated endpoint.
3. Keep review moderation and traveler authorization in place.
4. Preserve locale query parameters on new navigation links.
5. Use local or approved image assets instead of unreliable remote image URLs.
6. Run `php artisan test`, `php artisan view:cache`, and `npm run build` before pushing changes.

## Security notes

`.env`, dependencies, compiled assets, storage links, and local credentials are ignored by Git. Configure secrets only through environment variables and do not commit real credentials.
