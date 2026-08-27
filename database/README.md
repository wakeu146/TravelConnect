# TravelConnect database design

## Decisions

- `agencies.user_id` uses `RESTRICT`: an owner cannot be physically deleted while their business still exists, preserving the one-owner invariant and business records. Soft-deleting the user is the normal lifecycle operation.
- Agency documents, favorites, and pivot rows use `CASCADE` from an agency because they have no useful independent identity. Favorites also cascade from users because they are personal state.
- Agency reviews, inquiries, and trust-score logs use `RESTRICT` from agencies and users so audit and customer history cannot be accidentally destroyed. Soft-deleting the parent hides it from normal queries while retaining the history.
- Pivot references to countries and services use `RESTRICT`, preserving reference data while agencies still use it. Agency-side pivot rows cascade when an agency is physically removed.
- Users and agencies have soft deletes because they are core identity/business records. Documents, countries, services, pivots, reviews, inquiries, favorites, and trust-score logs do not: their parent rules preserve or remove them explicitly, and these records are not independently recoverable entities.
- `agencies.trust_score` is a deliberate denormalized cache of the latest score; `trust_score_logs` remains the historical source for auditability and recalculation.
- The rating check is added for MySQL connections. SQLite test runs skip that engine-specific `ALTER TABLE`; application validation should still accept only ratings from 1 through 5 there.

## Assumptions

- `email_verified_at` remains from the Laravel starter migration even though it was not repeated in the table list because the existing authentication contract uses it.
- `license_number` is not unique because uniqueness was not requested and licensing authorities can use different jurisdictions.
- A review has no uniqueness rule per traveler and agency because repeat reviews were not prohibited.
- The migration syntax targets MySQL 5.7+ and MySQL 8.x. The exact WAMP MySQL version and credentials must be confirmed locally; this repository currently has SQLite configured in `.env`.

## Run

With MySQL running and the existing `travelconnect` database selected in `.env`:

```text
php artisan migrate
php artisan db:seed
```

For a clean local database:

```text
php artisan migrate:fresh --seed
```