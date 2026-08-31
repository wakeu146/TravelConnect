# TravelConnect

TravelConnect is a Laravel travel marketplace for travelers and agencies. The app is designed to connect travelers with trusted agencies, help agencies present their expertise, and make the inquiry flow feel simple and professional.

## What was completed in this phase

This branch focuses on the public experience and multilingual UX, especially the language switch and mobile navigation behavior.

### Completed work

- Implemented locale-aware language switching for English and French
- Preserved selected language while navigating across public pages and auth pages
- Fixed the mobile language selector so it updates correctly on the first click
- Prevented the language selector from being rewritten by the generic locale helper
- Fixed the page loader to behave like a real browser-load indicator instead of a forced visual delay
- Unified the locale handling across shared public/auth layouts
- Reviewed and translated remaining public-facing English copy into the French language files
- Kept the functionality scoped to the front-end/localization flow without disturbing the rest of the app structure

### Main files touched

- `app/Http/Middleware/SetLocale.php`
- `bootstrap/app.php`
- `resources/js/app.js`
- `resources/views/components/site-header.blade.php`
- `resources/views/components/public-layout.blade.php`
- `resources/views/components/auth-layout.blade.php`
- `resources/views/welcome.blade.php`
- `lang/en/messages.php`
- `lang/fr/messages.php`

## Localization notes

The app uses Laravel localization with a session-aware locale middleware and URL query handling.

Behavior:

- `?lang=en` and `?lang=fr` are accepted as valid locale overrides
- the selected locale is stored in the session
- navigation links preserve the active locale
- auth and public pages keep the same selected language when moving through the app

## Mobile behavior

The mobile menu and language switch were handled separately from the desktop header logic to avoid the double-trigger issue. The mobile language buttons now behave like real link navigation instead of being overwritten by the generic locale rewrite logic.

## Loader behavior

The loader is only intended to appear when the browser is actively loading or navigating. It is not supposed to stay visible after the page is already ready.

## Tech stack

- Laravel
- PHP
- Blade templates
- Tailwind CSS
- Vite
- JavaScript for small UI interactions

## Local setup

```powershell
php artisan serve --host=127.0.0.1 --port=8000
npm run build
```

Then open:

```text
http://127.0.0.1:8000/
```

## Verification

The current regression check passed successfully:

```powershell
php artisan test --stop-on-failure
```

## Notes for teammates

- If you change the language flow, test both desktop and mobile views.
- Do not rewrite the language buttons with generic locale helper logic.
- Keep the locale helper isolated to non-selector links.
- The loader should remain tied to actual browser lifecycle events only.

## Recent commit summary

This work completes the front-end localization pass and stabilizes the language switching experience across devices.
