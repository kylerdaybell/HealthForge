# HealthForge: Project Game Plan

## 1. Project Philosophy

HealthForge is a modern, streamlined health and fitness application. Its core philosophy is to empower users to **forge** their own health journey through simple, powerful, and consistent tracking.

It avoids the bloat of competitors (like MyFitnessPal) by focusing on a core user loop:
1.  **Log:** Easily log food, exercise, and weight.
2.  **Personalize:** Build a personal library of foods and workouts for 1-click logging.
3.  **Progress:** See tangible results through clean charts and a visual photo gallery.

**Tech Stack:**
* **Backend:** Laravel API
* **Frontend:** Mobile-First, Responsive Web App (e.g., Blade + Livewire/Alpine.js or a separate JS framework)
* **Database:** MySQL / PostgreSQL
* **Authentication:** Laravel Sanctum
* **File Storage:** S3 (or local) for progress photos

---

## 2. Core Features

### Module 1: Core Tracking (The Essentials)
* **Daily Calorie Tracking:** Simple, clean interface for logging food.
* **Macro Tracking:** Automated macro counting (Protein, Carbs, Fats) based on food logs.
* **Weight Tracking:** Daily weight entry with a full historical chart.
* **Progress Photos:** Upload photos, which are stamped with date and weight.
* **Body Measurements:** (Non-Scale Victory) Log and chart waist, hips, arms, etc.

### Module 2: The "Global Library" (Admin-Managed)
* **Global Food Database:** An admin-managed `foods` table.
* **Admin Panel:** A simple CRUD interface (e.g., using Laravel Nova, Filament, or a custom-built one) for admins to add/edit/delete foods in the global library.
* **Smart Search:** Users can search this library to quickly log items.

### Module 3: The "User's Forge" (The Personal Library)
This is our key differentiator for simplicity. Users build their own library for fast, repeated logging.
* **"My Foods" (Recipe Builder):** Users can create custom meals (e.g., "My Morning Smoothie"). They add ingredients *once* from the global library, and the app saves the total nutrition. Users can then log "My Morning Smoothie" with one click.
* **"My Workouts" (Routine Builder):** Users can create workout templates (e.g., "Push Day"). When they log a workout, they can select this template to pre-fill the exercises.

### Module 4: The Dashboard & Progress Hub
* **Dashboard:** The homepage. An "at-a-glance" view of today's calories, macros, and a snapshot of recent weight.
* **Progress Gallery:** The main hub for seeing results.
    * Interactive weight/measurement charts (1M, 3M, 6M, 1Y).
    * A visual gallery of all progress photos.
    * **Key Feature:** A side-by-side photo comparison tool (e.g., "Compare Jan 1 vs. Today").

---

## 3. Development Game Plan (MVP Roadmap)

This is the step-by-step plan to build the application.

### Phase 1: The Foundation
*Goal: Get the project live and secure user accounts.*
1.  **Setup:** New Laravel project, database, and Git repo.
2.  **Auth:** Install Laravel Sanctum. Implement API-based registration, login, and logout.
3.  **User Profile:**
    * Create `users` and `user_profiles` tables.
    * Build the "Profile" page where users can set their height, DOB, and calorie/macro goals.
4.  **Database Schema:** Implement the *entire* database schema from our plan (run all migrations).

### Phase 2: The Core Loop (Logging & Admin)
*Goal: Get the fundamental daily-use features working.*
1.  **Admin Panel:** Build the basic admin-only section.
2.  **Global Food Library:** Implement the CRUD for the `foods` table (Admin-only). Populate it with an initial 100-200 common foods.
3.  **Food Logging (v1):**
    * Create the "Daily Log" page (view by date).
    * Build the "Log Food" feature. Users can search the `foods` table and add an item to their log for a specific meal.
    * Implement the `food_logs` table logic.
4.  **Dashboard (v1):** Create the dashboard to show *only* today's total calories vs. goal.
5.  **Weight Logging:**
    * Implement the "Log Weight" feature (`weight_logs` table).
    * Add a simple weight chart to the "Progress" page (using Chart.js).

### Phase 3: The "Forge" (Personalization)
*Goal: Build the "secret sauce" that makes the app simple and personal.*
1.  **"My Foods" (Recipes):**
    * Build the CRUD for `user_foods` and `user_food_ingredients`.
    * Users can create a "recipe" by searching the global `foods` library and adding ingredients.
2.  **Food Logging (v2):**
    * Upgrade the "Log Food" search. It should now search *both* the global `foods` and the user's `user_foods` tables.
3.  **Exercise Library:**
    * Implement CRUD for the global `exercise_library` (Admin-only).
    * Implement `exercise_logs` logic. Users can log a strength or cardio workout.
4.  **"My Workouts" (Routines):**
    * Build the CRUD for `workout_routines` and `workout_routine_exercises`.
    * Users can create a "routine" and add exercises from the `exercise_library`.
    * Add a "Start Routine" button on the "Log Exercise" page.

### Phase 4: The "Payoff" (Visual Progress)
*Goal: Give users the motivation to keep going.*
1.  **Progress Photos:**
    * Implement file uploads (`progress_photos` table), linking to S3 or local storage.
    * Build the "Photo Gallery" page.
2.  **Compare Tool:** Build the side-by-side photo comparison view. This is a critical motivational feature.
3.  **Body Measurements:** Implement logging and charting for `body_measurements`.

### Phase 5: Polish & Deployment
*Goal: Make it production-ready.*
1.  **Responsive UI:** Final pass on all views to ensure they are 100% mobile-friendly.
2.  **Testing:** Write feature/unit tests for core logic (calorie calculation, auth, etc.).
3.  **Deployment:** Set up a production environment (e.g., Forge/Vapor, DigitalOcean) with a CI/CD pipeline.

---

## 4. Key API Endpoints (Draft)

This will be the backbone of the application.

// --- AUTH --- POST /register POST /login POST /logout

// --- PROFILE --- GET /api/user/profile PUT /api/user/profile // Update goals, height, etc.

// --- LIBRARIES (Reading) --- GET /api/library/foods // Search global AND user food libraries GET /api/library/exercises // Search global exercise library

// --- USER'S FORGE (Writing) --- GET /api/user/foods // Get all "My Foods" POST /api/user/foods // Create new "My Food" (recipe) GET /api/user/foods/{id} // Get single "My Food" PUT /api/user/foods/{id} DELETE /api/user/foods/{id} // (Repeat for /api/user/workouts)

// --- DAILY LOGS --- GET /api/logs/{date} // Get all logs for a specific day POST /api/logs/food // Add a food item to a day DELETE /api/logs/food/{logId} POST /api/logs/exercise DELETE /api/logs/exercise/{logId} POST /api/logs/weight DELETE /api/logs/weight/{logId}

// --- PROGRESS --- GET /api/progress/weight // Get all weight logs for charting GET /api/progress/photos // Get all photo data POST /api/progress/photos // Upload a new photo DELETE /api/progress/photos/{id}