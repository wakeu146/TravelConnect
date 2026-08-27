# TravelConnect

TravelConnect is a Laravel travel-agency marketplace. Travelers discover trusted agencies, compare expertise, save agencies, send inquiries, and write reviews. Agency owners manage their profiles and verification documents. Administrators will review agencies, documents, and reviews.

## Current Status

Authentication and the first public product surfaces are implemented. We paused immediately after completing and testing authentication, before continuing with the agency management dashboard.

Completed authentication:

- Traveler and agency-owner registration
- Login with remember-me support
- Logout and protected dashboard access
- Six-digit password-recovery verification code sent by email
- Ten-minute code expiry and five-attempt limit
- Hashed recovery-code storage in `password_reset_codes`
- New-password creation and redirect back to login
- SMTP delivery through Gmail
- Professional HTML and plain-text password-recovery email templates
- Friendly SMTP error handling instead of exposing a raw exception page

The dashboard shown after login is intentionally the original simple authenticated dashboard. A dynamic agency management dashboard was prototyped and then removed at the user's request. We ended with authentication as the stable checkpoint.

## Stack

- Laravel 13
- PHP 8.3+
- MySQL/MariaDB
- Blade components
- Tailwind CSS v4
- Vite
- Vanilla JavaScript for small interactions

## Run Locally

1. Make sure WAMP MySQL or MariaDB is running on port `3306`.
2. Confirm `.env` contains the correct database values.
3. Start Laravel:

```powershell
php artisan serve --host=127.0.0.1 --port=8000
```

4. Build frontend assets after frontend changes:

```powershell
npm run build
```

5. Open `http://127.0.0.1:8000/`.

Useful checks:

```powershell
php artisan view:cache
php artisan route:list
php artisan migrate:status
```

## Public Routes

- `/` - homepage
- `/discover` - agency directory prototype
- `/how-it-works` - traveler workflow explanation
- `/for-agencies` - agency partner page
- `/login` - login
- `/register` - account-type selection
- `/register/agency` - agency-owner registration
- `/register/traveler` - traveler registration
- `/forgot-password` - request a six-digit recovery code
- `/verify-reset-code` - verify the recovery code
- `/reset-password` - set a new password after verification
- `/dashboard` - authenticated dashboard

Routes are defined in `routes/web.php`.

## Frontend Structure

Shared Blade components are in `resources/views/components/`:

- `public-layout.blade.php` - shared public HTML shell
- `auth-layout.blade.php` - authentication page shell with page loader
- `site-header.blade.php` - responsive header, logo, desktop links, and mobile drawer
- `site-footer.blade.php` - shared footer with navigation, contact, newsletter, and legal links
- `agency-card.blade.php` - reusable agency card
- `agency-benefit.blade.php` - reusable agency benefit block

Pages are in `resources/views/` and use the shared components. Do not copy the header or footer into a new page. Use the components instead.

The logo is stored at `public/images/logo.png` and should be referenced with:

```blade
{{ asset('images/logo.png') }}
```

JavaScript lives in `resources/js/app.js`. It currently controls the agency carousel and mobile menu. Keep interactions small and page-safe; check that a queried element exists when adding behavior to optional components.

## Domain Model

Important models are in `app/Models/`:

- `User`: traveler, agency owner, or admin
- `Agency`: company details, verification status, and trust score
- `Country` and `Service`: agency categories
- `Favorite`: saved agency relationship
- `Inquiry`: traveler message to an agency
- `Review`: rating and moderated comment
- `AgencyDocument`: verification uploads
- `TrustScoreLog`: trust score history

Enums are in `app/Enums/`:

- `UserRole`: `traveler`, `agency_owner`, `admin`
- `VerificationStatus`: `pending`, `verified`, `rejected`
- `DocumentStatus`: `pending`, `approved`, `rejected`
- `InquiryStatus`: `open`, `responded`, `closed`
- `ReviewStatus`: `pending`, `published`, `flagged`

The database is seeded with sample countries, services, users, verified agencies, reviews, inquiries, documents, favorites, and trust-score logs.

Password recovery also uses the `password_reset_codes` table. The code is hashed, expires after ten minutes, and is deleted after successful verification.

## SMTP Configuration

SMTP is configured through `.env` and the credentials must never be committed or added to documentation. The local setup uses Gmail SMTP:

```env
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-sender@gmail.com
MAIL_PASSWORD=your-gmail-app-password
MAIL_FROM_ADDRESS="your-sender@gmail.com"
MAIL_FROM_NAME="TravelConnect"
```

Use a Gmail App Password, not the normal Gmail password. After changing mail settings, clear the Laravel configuration cache:

```powershell
php artisan optimize:clear
```

The reset email is delivered synchronously during local development because no queue worker is required for the recovery flow.

## Safe Next Steps

Authentication is the current completed checkpoint. The next planned feature is the agency management area, starting with a proper product decision and then implementation:

1. Design the agency-owner navigation and information architecture.
2. Create an agency profile during agency registration.
3. Build a real agency profile editor.
4. Add owner-scoped inquiry management.
5. Add verification document management.
6. Add analytics based on real database activity.
7. Add feature tests for every management action.

The earlier dashboard prototype was removed. Do not reintroduce its controller, sidebar, management views, or routes without confirming the design and scope first.

Do not add booking, payments, live chat, or itinerary management without extending the domain model first. The current inquiry model stores one subject and one message; it does not yet support threaded conversations.

## Important Notes for Future AI Agents

- Read this README and `AGENTS.md` before changing code.
- Preserve the existing white, navy, teal, and coral visual language.
- Keep pages responsive from mobile through desktop.
- Use shared components for repeated structure.
- Keep form field names and database contracts stable when improving UI.
- Run `php artisan view:cache`, `npm run build`, and a live route check after frontend changes.
- Run `php artisan test` after authentication or database changes.
- Do not commit changes unless explicitly requested.
