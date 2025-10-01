# Table Prefix Setup Guide

This guide explains how to apply table prefixes to your Laravel application to ensure all database tables use a consistent prefix.

## What Was Changed

### 1. Database Configuration (`config/database.php`)
- Updated all database connection configurations to use `env('DB_PREFIX', 'apar_')` for the `prefix` setting
- Updated the migrations table configuration to use the prefix: `env('DB_PREFIX', 'apar_') . 'migrations'`

### 2. Session Configuration (`config/session.php`)
- Updated the session table configuration to use the prefix: `env('SESSION_TABLE', env('DB_PREFIX', 'apar_') . 'sessions')`

### 3. Environment Configuration (`.env.example`)
- Added `DB_PREFIX=apar_` to the example environment file

### 4. Migration for Existing Tables
- Created migration `2025_10_01_043304_add_table_prefix_to_existing_tables.php` to rename existing tables

## Steps to Apply Table Prefix

### Step 1: Set Environment Variable
Add the following line to your `.env` file:
```bash
DB_PREFIX=apar_
```

### Step 2: Clear Configuration Cache
```bash
php artisan config:clear
```

### Step 3: Run the Table Prefix Migration
```bash
php artisan migrate
```

This will rename all existing tables to include the prefix:
- `cache` → `apar_cache`
- `cache_locks` → `apar_cache_locks`
- `failed_jobs` → `apar_failed_jobs`
- `jobs` → `apar_jobs`
- `job_batches` → `apar_job_batches`
- `migrations` → `apar_migrations`
- `password_reset_tokens` → `apar_password_reset_tokens`
- `sessions` → `apar_sessions`
- `users` → `apar_users`
- `apar_forms` → `apar_apar_forms`
- `apar_roles` → `apar_apar_roles`
- `apar_user_roles` → `apar_apar_user_roles`
- `apar_form_data` → `apar_apar_form_data`

## Tables Affected

The following system tables will now use the prefix:
1. **cache** - Cache storage table
2. **cache_locks** - Cache locking table
3. **failed_jobs** - Failed queue jobs
4. **jobs** - Queue jobs
5. **job_batches** - Job batches
6. **migrations** - Migration tracking
7. **password_reset_tokens** - Password reset tokens
8. **sessions** - User sessions
9. **users** - Application users

And your application-specific tables:
10. **apar_forms** - APAR forms
11. **apar_roles** - APAR roles
12. **apar_user_roles** - User role assignments
13. **apar_form_data** - APAR form data

## Customizing the Prefix

If you want to use a different prefix, simply change the `DB_PREFIX` value in your `.env` file:
```bash
DB_PREFIX=myapp_
```

## Rollback (if needed)

If you need to remove the prefix, you can:

1. Remove or set `DB_PREFIX=` (empty) in your `.env` file
2. Run `php artisan config:clear`
3. Run `php artisan migrate:rollback` to run the down method of the prefix migration

## Important Notes

- The migration is designed to be safe and will only rename tables that exist and don't already have the prefix
- All future migrations and table operations will automatically use the configured prefix
- Laravel's Eloquent models will automatically work with the prefixed tables
- Queue jobs, cache operations, and sessions will use the prefixed tables
- The migration handles both forward (adding prefix) and rollback (removing prefix) operations

## Verification

After running the migration, you can verify the changes by:

1. Checking your database to confirm table names now include the prefix
2. Running `php artisan migrate:status` to see the migration status
3. Testing your application functionality to ensure everything works correctly

## Database Connection Example

With MySQL, your `.env` file should look like this:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
DB_PREFIX=apar_
```