# Laravel APAR Application - Technical Documentation

## Project Overview
**Application Name:** Laravel APAR (Annual Performance and Appraisal Report)  
**Framework:** Laravel 11.x  
**Database:** MySQL  
**Authentication:** Laravel Breeze  
**Date Created:** September 30, 2025  

## Architecture Overview

### Database Design
**Database Name:** `apar_app`  
**Table Prefix:** `apar_`  

#### Core Tables Structure:
1. **apar_users** - User management with roles
2. **apar_forms** - Form records (representing "files")
3. **apar_form_sections** - Form section definitions
4. **apar_form_data** - Actual form field data
5. **apar_roles** - User role definitions

### User Roles
1. **Reviewing Officer** (Admin role)
   - Email: reviewing.officer@tropmet.res.in
   - Password: Admin@123
   - Access: Parts 3, 4, 5
   - Can create new forms
   
2. **Reporting Officer** (Standard role)  
   - Email: reporting.officer@tropmet.res.in
   - Password: Iitm@123
   - Access: Parts 3, 4, B

### Form Access Permissions
- **Part 3 & Part 4:** Accessible to both user roles
- **Part 5:** Reviewing Officer only
- **Part B:** Reporting Officer only

### Key Components

#### Models
- **User.php** - User model with role relationships
- **Form.php** - Main form model  
- **FormSection.php** - Form section definitions
- **FormData.php** - Individual form field data
- **Role.php** - User role model

#### Controllers
- **AuthController** - Handle authentication and password changes
- **FormController** - CRUD operations for forms
- **DashboardController** - Role-based dashboard views

#### Views Structure
- **auth/** - Login/register/password reset views
- **dashboard/** - Role-specific dashboard views  
- **forms/** - Form creation and editing views
- **layouts/** - Base layouts with role-based navigation

### Form Structure (Simplified from Word Document)
The original Word document contains complex APAR sections:
1. **Part 1** - Employee identification (Admin filled)
2. **Part 2** - Self-assessment  
3. **Part 3** - Numerical grading (both roles)
4. **Part 4** - General assessment (both roles)
5. **Part 5** - Reviewing officer remarks (Reviewing only)
6. **Part A** - Self-assessment details
7. **Part B** - Assessment by reporting authority (Reporting only)

### Security Features
- Role-based access control
- CSRF protection on all forms
- Input validation and sanitization
- Password hashing using Laravel's bcrypt
- Session-based authentication

### Development Standards
- Following Laravel coding conventions
- PSR-4 autoloading
- Eloquent ORM for database operations
- Blade templating engine
- Route model binding for security

## Application Technology Documentation (application_tech.md)

## Stack
- Laravel 12.x (PHP framework)
- MySQL (Database)
- Composer (Dependency management)
- PHP 8.x
- Laravel Breeze (Authentication scaffolding)

## Directory Structure
- `apar_app/` - Main Laravel application
- Documentation files: `did.md`, `application_tech.md`, `todo.md`

## Database
- Name: apar_app
- Table prefix: apar_

## Authentication
- Laravel Breeze (simple, modern authentication)

## Roles
- Reviewing Officer/Admin
- Reporting Officer

## Form Handling
- APAR form web version based on provided Word HTML
- Normalized database design
- Each "file/form" is a database record

## Next Steps
- Configure database
- Install Breeze
- Implement roles and form structure

## Installation & Setup
*(To be updated as development progresses)*

## API Documentation  
*(To be added if API endpoints are created)*

## Testing Strategy
*(To be defined during development)*

## Final Implementation Details

### Complete Database Schema
**Tables Created:**
1. **apar_forms** - Main form records with all employee fields:
   - employee_name, designation, employee_id, date_of_birth
   - section_or_group, area_of_specialization, date_of_joining
   - email, mobile_no, report_year, department (optional)
   - status (draft/in_progress/completed), created_by

2. **apar_roles** - Role definitions:
   - reviewing_officer: Full access to Parts 3,4,5 + create forms + view Part B
   - reporting_officer: Access to Parts 3,4,B

3. **apar_user_roles** - User-role assignments (many-to-many)

4. **apar_form_data** - Dynamic form section data storage

### Controllers and Business Logic
- **DashboardController**: Statistics display, role-based form listing
- **AparFormController**: Full CRUD with role-based section access control
- **ProfileController**: Password change functionality (Laravel Breeze)

### Views and User Interface
- **Dashboard**: Statistics cards, form listing table, role-based create button
- **Form Creation**: All 10 required employee fields with validation
- **Form Display**: Role-based section access with inline editing:
  - JavaScript-powered edit/view toggle for each section
  - Form data persistence using dynamic field storage
  - Proper permission checking for each section

### Authentication System
- Laravel Breeze authentication with enhanced role system
- Custom middleware for APAR role checking
- Password change functionality included

### Form Access Control Implementation
- **Part 3 & 4**: Both Reviewing and Reporting Officers (view/edit)
- **Part 5**: Reviewing Officer only (view/edit)
- **Part B**: Reporting Officer can edit, Reviewing Officer can view
- **File Creation**: Only Reviewing Officers can create new forms

### Technology Stack Final
- **Framework**: Laravel 12.x
- **Database**: MySQL with apar_app database
- **Authentication**: Laravel Breeze (Blade + Alpine.js)
- **Frontend**: Tailwind CSS, Alpine.js, Blade templates
- **Server**: PHP built-in development server

### User Credentials (Production Ready)
- **Reviewing Officer**: reviewing.officer@tropmet.res.in / Admin@123
- **Reporting Officer**: reporting.officer@tropmet.res.in / Iitm@123

### Application URLs
- **Main Application**: http://127.0.0.1:8000
- **Login**: http://127.0.0.1:8000/login
- **Dashboard**: http://127.0.0.1:8000/dashboard (after login)

---
**Last Updated:** September 30, 2025  
**Status:** Complete and Ready for Production Testing