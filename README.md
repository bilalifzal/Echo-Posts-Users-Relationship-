<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<div align="center">

```
███████╗ ██████╗██╗  ██╗ ██████╗ ███████╗███████╗
██╔════╝██╔════╝██║  ██║██╔═══██╗██╔════╝██╔════╝
█████╗  ██║     ███████║██║   ██║█████╗  ███████╗
██╔══╝  ██║     ██╔══██║██║   ██║██╔══╝  ╚════██║
███████╗╚██████╗██║  ██║╚██████╔╝███████╗███████║
╚══════╝ ╚═════╝╚═╝  ╚═╝ ╚═════╝ ╚══════╝╚══════╝
                    S T U D I O
```

<h3>The Ultimate Creator Studio for Modern Writers</h3>

<p>
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" />
  <img src="https://img.shields.io/badge/GSAP-3.12-88CE02?style=for-the-badge&logo=greensock&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Vite-5.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" />
</p>

<p>
  <img src="https://img.shields.io/badge/Status-Active%20Development-brightgreen?style=flat-square" />
  <img src="https://img.shields.io/badge/License-MIT-blue?style=flat-square" />
  <img src="https://img.shields.io/badge/Author-Muhammad%20Bilal%20Ifzal-blueviolet?style=flat-square" />
</p>

<br/>

> **Write. Manage. Analyze. Scale.** — All from one professional dashboard.

</div>

---

## 📖 Table of Contents

- [About The Project](#-about-the-project)
- [✨ Feature Highlights](#-feature-highlights)
- [🏗️ Architecture Overview](#️-architecture-overview)
- [🖥️ The Three Layers](#️-the-three-layers)
  - [Public Layer](#1-public-layer)
  - [Creator Studio](#2-creator-studio)
  - [Admin God Mode Panel](#3-admin-god-mode-panel)
- [🗄️ Database Schema](#️-database-schema)
- [⚙️ Tech Stack & Why](#️-tech-stack--why)
- [📁 Project Structure](#-project-structure)
- [🚀 Getting Started](#-getting-started)
- [🔐 Authentication & Roles](#-authentication--roles)
- [🔁 Polymorphic Relationships](#-polymorphic-relationships)
- [📸 Key Pages Breakdown](#-key-pages-breakdown)
- [🤝 Contributing](#-contributing)
- [👨‍💻 Author](#-author)

---

## 🚀 About The Project

**Echoes Studio** is a full-stack blog publishing platform built with **Laravel** — engineered from scratch to give writers a professional, distraction-free environment to create, manage, and analyze their content.

This isn't just a CRUD blog. Echoes is a **three-tiered ecosystem**:

- A **beautiful public-facing reading experience** for audiences
- A **powerful creator studio** for authors to write, manage drafts, track likes, and view their analytics
- A **ruthless admin control panel ("God Mode")** for platform governance, user management, content moderation, and system health monitoring

The entire interface is powered by **GSAP animations**, styled with **Tailwind CSS**, uses a **Quill rich text editor** for writing, and is backed by a **Laravel Eloquent ORM** with **polymorphic relationships** for a scalable, production-grade architecture.

---

## ✨ Feature Highlights

### 🌍 Public Experience
| Feature | Description |
|---|---|
| 📰 **Post Reader** | Clean, distraction-free full-post reading experience with reading-time estimation |
| ❤️ **Like System** | Toggle likes on posts, powered by polymorphic Eloquent relationships |
| 💬 **Comment System** | Threaded discussion section on every post with live comment counts |
| 👤 **Creator Portfolios** | Dedicated public profile pages for every author showing their published posts, total likes, and discussion counts |
| 🔭 **Topic Explorer** | Browse posts filtered by topic/tag with a stylized header and post grid |
| 🔐 **Auth Gates** | Prompts for login/register intelligently wherever interaction is needed |

### ✍️ Creator Studio
| Feature | Description |
|---|---|
| 📝 **Rich Text Editor** | Quill.js-powered editor with full formatting toolbar (headings, colors, images, code blocks, lists, embeds) |
| 🗂️ **Draft Management** | Save posts as drafts and resume writing any time |
| 📚 **Blog Manager** | Full list of all your published posts with quick actions |
| ❤️ **Liked Posts Library** | Curated personal collection of all posts you've liked across the platform |
| 💬 **My Comments** | View and delete every comment you've ever posted on the platform |
| 📊 **Analytics Dashboard** | Author-level performance insights |
| ✏️ **In-Place Editing** | Edit any post with full image replacement, SEO fields, tag updates, and status toggling |
| 🖼️ **Cover Image Upload** | Upload cover images per post, stored via Laravel's public disk |

### 🔴 Admin God Mode Panel
| Feature | Description |
|---|---|
| 📊 **Live Dashboard** | Platform-wide stats — total users, posts, and key metrics at a glance |
| 👥 **Creator Management** | Browse and manage every registered user on the platform |
| 📝 **Global Post Feed** | See, search, and moderate all posts from all creators |
| ⚠️ **Security & Reports** | Triage reported content with moderation actions: Review, Dismiss, or Takedown |
| 💳 **Stripe Subscriptions** | Manage premium creator subscriptions |
| 💸 **Creator Payouts** | Monitor payout pipeline for monetized creators |
| ⚙️ **Platform Configuration** | System-wide settings and controls |
| 🗄️ **Database Backups** | Monitor backup health, storage usage, server uptime, and download snapshots |
| 🖥️ **Live System Console** | Terminal-style system log inside the browser (GSAP-animated) |

---

## 🏗️ Architecture Overview

```
┌─────────────────────────────────────────────────────────────┐
│                        ECHOES STUDIO                        │
│                                                             │
│  ┌──────────────┐  ┌─────────────────┐  ┌───────────────┐  │
│  │   PUBLIC     │  │  CREATOR STUDIO │  │  ADMIN PANEL  │  │
│  │   LAYER      │  │  (Auth Guard)   │  │  (God Mode)   │  │
│  │              │  │                 │  │  (is_admin)   │  │
│  │  welcome     │  │  dashboard      │  │  dashboard    │  │
│  │  show post   │  │  blogs          │  │  users        │  │
│  │  explore     │  │  drafts         │  │  posts        │  │
│  │  creator     │  │  liked          │  │  reports      │  │
│  │  footer      │  │  comments       │  │  payouts      │  │
│  │              │  │  analytics      │  │  subscriptions│  │
│  │              │  │  edit post      │  │  settings     │  │
│  │              │  │                 │  │  backups      │  │
│  └──────────────┘  └─────────────────┘  └───────────────┘  │
│                                                             │
│  ┌─────────────────────────────────────────────────────┐    │
│  │              LARAVEL BACKEND ENGINE                  │    │
│  │                                                      │    │
│  │   PostController  │  LikeController  │ ProfileCtrl  │    │
│  │   CommentController (morphTo)                        │    │
│  │   AdminController (dashboard/users/posts/reports)    │    │
│  └─────────────────────────────────────────────────────┘    │
│                                                             │
│  ┌─────────────────────────────────────────────────────┐    │
│  │              ELOQUENT ORM LAYER                      │    │
│  │                                                      │    │
│  │  User ──hasMany──▶ Post                              │    │
│  │  Post ──morphMany──▶ Like  (likeable)                │    │
│  │  Post ──morphMany──▶ Comment (commentable)           │    │
│  │  Comment ──morphMany──▶ Like (likeable)              │    │
│  │  User ──belongsTo──▶ Like                            │    │
│  └─────────────────────────────────────────────────────┘    │
│                                                             │
│  ┌─────────────────────────────────────────────────────┐    │
│  │                 MySQL DATABASE                       │    │
│  │  users │ posts │ comments │ likes │ sessions         │    │
│  │  cache │ jobs  │ password_reset_tokens               │    │
│  └─────────────────────────────────────────────────────┘    │
└─────────────────────────────────────────────────────────────┘
```

---

## 🖥️ The Three Layers

### 1. Public Layer

The public layer is the audience-facing side of Echoes. No login required to read. Clean, professional, and fast.

**`welcome.blade.php`** — The platform landing page. Marketing-grade hero section with CTAs to register or explore the network.

**`show.blade.php`** — The individual post reading view. Features:
- Full Quill-rendered rich text body with `prose` Tailwind classes
- Reading time estimation (`ceil(str_word_count / 200)` min)
- Like button with toggle (polymorphic under the hood)
- Full comment section with post-comment form (auth-gated)
- Author attribution card

**`explore.blade.php`** — Topic explorer. Accepts a `$displayTopic` and filters posts by tag. Features a dark hero header and a 3-column post card grid.

**`creator.blade.php`** — Public creator portfolio page. Displays a creator's avatar initial, post count, total likes, and total discussions. Lists all their published posts in a card grid.

**`footer.blade.php`** — Reusable footer component (`@include('components.footer')`). Contains platform links and the signature "Engineered with ❤️ by Muhammad Bilal Ifzal" badge.

---

### 2. Creator Studio

The Studio is the authenticated writer's workspace. Protected by Laravel's `auth` middleware. Sidebar navigation is consistent across all studio pages with GSAP entrance animations.

**`dashboard.blade.php`** — The main writing interface. Houses the Quill.js rich text editor for composing new posts. Includes cover image upload, category/tags input, SEO excerpt, status selector (published/draft), and visibility controls.

**`blogs.blade.php`** — The content manager. Lists all of the authenticated user's posts with thumbnail previews, status badges, quick edit and delete actions, and post stats.

**`drafts.blade.php`** — Unfinished masterpieces. Lists all posts with `status = 'draft'` with a "Resume Writing" CTA that links to the edit page. Includes delete with animated confirmation modal.

**`edit.blade.php`** — The post editor for existing content. Pre-populates Quill editor with existing HTML body via `{!! old('body', $post->body) !!}`. Supports image replacement, status toggling, and full field updates via `PUT` request.

**`liked.blade.php`** — The personal like library. Shows all posts the authenticated user has liked across the platform. Toggle-unlike directly from this page.

**`comments.blade.php`** — Comment history. Every comment the user has left across the platform, with the post title it belongs to. Includes per-comment delete with animated modal.

**`analytics.blade.php`** — Author-level analytics dashboard. Post performance metrics, engagement data, and growth tracking.

---

### 3. Admin God Mode Panel

The admin panel is a completely separate dark-themed interface (`bg-[#0B1120]`), protected by an `is_admin` boolean check on the `users` table. It is a mission-control command center for the platform.

**`admin/dashboard.blade.php`** — Live platform overview. Real-time counts of total users, posts, and platform health metrics.

**`admin/users.blade.php`** — Full user registry. Browse every registered creator, view their account details, and take administrative actions.

**`admin/posts.blade.php`** — Global post feed. Aggregated view of every post on the platform — regardless of author. Search, filter, and moderate.

**`admin/reports.blade.php`** — The security triage center. Displays all reported content tickets. Columns: Ticket ID, Reported Target (User/Post/Comment with icon), Violation Claim badge, Submitted By, and three moderation action buttons: **Review Item**, **Dismiss**, and **Takedown**. Features an animated red gradient header bar.

**`admin/subscriptions.blade.php`** — Stripe subscription manager. View and manage premium plan subscriptions tied to creator accounts.

**`admin/payouts.blade.php`** — Creator payout pipeline. Track monetized creator earnings and payout status.

**`admin/settings.blade.php`** — Platform-wide configuration controls.

**`admin/backups.blade.php`** — The data vault. Three stat cards showing last backup status, total S3 storage used, and server uptime percentage. A full backup archive history table. And a **GSAP-animated terminal console** that mimics a real system log, streaming diagnostic lines on page load — pure engineering theatre.

---

## 🗄️ Database Schema

### `users`
| Column | Type | Notes |
|---|---|---|
| `id` | bigint PK | Auto-increment |
| `name` | string | Display name |
| `email` | string unique | Login identifier |
| `email_verified_at` | timestamp | Nullable |
| `password` | string | Bcrypt hashed |
| `is_admin` | boolean | Default: `false`. Gates admin panel access |
| `remember_token` | string | Session persistence |
| `created_at / updated_at` | timestamps | — |

### `posts`
| Column | Type | Notes |
|---|---|---|
| `id` | bigint PK | — |
| `user_id` | FK → users | `cascadeOnDelete` |
| `title` | string | Nullable |
| `body` | text | Quill HTML output |
| `image_path` | string | Nullable. Laravel public disk path |
| `status` | string | `published` or `draft`. Default: `published` |
| `visibility` | string | `public` or `private`. Default: `public` |
| `tags` | string | Nullable. Comma-separated |
| `excerpt` | text | Nullable. SEO meta description |
| `created_at / updated_at` | timestamps | — |

### `comments`
| Column | Type | Notes |
|---|---|---|
| `id` | bigint PK | — |
| `user_id` | FK → users | `cascadeOnDelete` |
| `commentable_id` | bigint | Polymorphic target ID |
| `commentable_type` | string | Polymorphic target class (e.g. `App\Models\Post`) |
| `body` | text | Comment content |
| `created_at / updated_at` | timestamps | — |

### `likes`
| Column | Type | Notes |
|---|---|---|
| `id` | bigint PK | — |
| `user_id` | FK → users | `cascadeOnDelete` |
| `likeable_id` | bigint | Polymorphic target ID |
| `likeable_type` | string | Polymorphic target class |
| `created_at / updated_at` | timestamps | — |

### Supporting Tables
| Table | Purpose |
|---|---|
| `sessions` | Laravel database session driver |
| `cache` / `cache_locks` | Application caching layer |
| `jobs` / `job_batches` / `failed_jobs` | Laravel queue infrastructure |
| `password_reset_tokens` | Secure password recovery |

---

## ⚙️ Tech Stack & Why

| Technology | Role | Why |
|---|---|---|
| **Laravel 12** | Full-stack PHP framework | Eloquent ORM, routing, auth scaffolding, blade templating, middleware, and file storage — all out of the box |
| **MySQL 8** | Relational database | Rock-solid, proven, perfect for relational blog data with foreign keys and cascading deletes |
| **Tailwind CSS 3** | Utility-first styling | Allows pixel-precise UI without leaving HTML. Enables the dark admin panel and light studio to coexist cleanly |
| **GSAP 3.12** | JavaScript animation | Handles all entrance animations — sidebar slides, fade-ins, staggered card reveals, and the terminal console typing effect |
| **Quill.js 1.3** | Rich text editor | Embeds directly in Blade templates. Outputs proper HTML stored in the `body` column and rendered with `{!! !!}` |
| **Vite 5** | Frontend asset bundler | Replaces Mix. Handles CSS and JS compilation with HMR for fast development |
| **Laravel Breeze / Auth** | Authentication scaffolding | Provides login, register, password reset, email verification with minimal boilerplate |

---

## 📁 Project Structure

```
echoes-studio/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php            # Base abstract controller
│   │   │   ├── PostController.php        # store, destroy, edit, update
│   │   │   ├── LikeController.php        # toggleLike (polymorphic)
│   │   │   ├── ProfileController.php     # edit, update, destroy account
│   │   │   └── Admin/
│   │   │       └── AdminController.php   # dashboard, users, posts, reports...
│   │   └── Requests/
│   │       └── ProfileUpdateRequest.php
│   │
│   └── Models/
│       ├── User.php      # hasMany posts
│       ├── Post.php      # morphMany likes & comments, belongsTo user
│       ├── Comment.php   # morphTo, belongsTo user, morphMany likes
│       └── Like.php      # morphTo, belongsTo user
│
├── database/
│   └── migrations/
│       ├── 0001_01_01_000000_create_users_table.php
│       ├── 0001_01_01_000001_create_cache_table.php
│       ├── 0001_01_01_000002_create_jobs_table.php
│       ├── 2026_04_27_055434_create_posts_table.php
│       ├── 2026_04_27_055441_create_comments_table.php
│       ├── 2026_04_27_055447_create_likes_table.php
│       ├── 2026_04_27_063319_add_is_admin_to_users_table.php
│       ├── 2026_04_27_094232_add_extra_fields_to_posts_table.php
│       ├── 2026_04_27_102210_add_professional_fields_to_posts_table.php
│       ├── 2026_04_27_102921_add_post_id_to_likes_table.php
│       ├── 2026_04_28_111827_force_drop_post_id_from_likes.php
│       └── 2026_04_28_172658_add_is_admin_to_users_table.php
│
├── resources/
│   └── views/
│       ├── components/
│       │   └── footer.blade.php          # Global footer component
│       │
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── users.blade.php
│       │   ├── posts.blade.php
│       │   ├── reports.blade.php
│       │   ├── subscriptions.blade.php
│       │   ├── payouts.blade.php
│       │   ├── settings.blade.php
│       │   └── backups.blade.php
│       │
│       ├── studio/
│       │   ├── blogs.blade.php
│       │   ├── drafts.blade.php
│       │   ├── liked.blade.php
│       │   ├── comments.blade.php
│       │   └── analytics.blade.php
│       │
│       ├── posts/
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       │
│       ├── dashboard.blade.php           # Writing studio home
│       ├── welcome.blade.php             # Public landing page
│       ├── explore.blade.php             # Topic explorer
│       └── creator.blade.php            # Public creator portfolio
│
├── public/
│   └── storage/                          # Symlinked uploads (cover images)
│
├── routes/
│   └── web.php                           # All application routes
│
├── vite.config.js
├── tailwind.config.js
├── package.json
└── composer.json
```

---

## 🚀 Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP >= 8.2
- Composer
- Node.js >= 18 & npm
- MySQL 8.0+
- Laravel CLI (`composer global require laravel/installer`)

---

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/yourusername/echoes-studio.git
cd echoes-studio
```

**2. Install PHP dependencies**

```bash
composer install
```

**3. Install Node dependencies**

```bash
npm install
```

**4. Set up your environment file**

```bash
cp .env.example .env
php artisan key:generate
```

**5. Configure your `.env` database credentials**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=echoes_studio
DB_USERNAME=root
DB_PASSWORD=your_password
```

**6. Run all migrations**

```bash
php artisan migrate
```

**7. Create the storage symlink** (required for cover image uploads)

```bash
php artisan storage:link
```

**8. Build frontend assets**

```bash
npm run build
```
> For development with hot-reload:
> ```bash
> npm run dev
> ```

**9. Start the development server**

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` — Echoes Studio is live. 🎉

---

### Making Yourself an Admin

After registering an account, open your database and run:

```sql
UPDATE users SET is_admin = 1 WHERE email = 'your@email.com';
```

Then navigate to `/admin/dashboard` to enter **God Mode**. ⚡

---

## 🔐 Authentication & Roles

Echoes uses Laravel's built-in authentication system (Breeze-compatible) with a custom `is_admin` boolean column added via migration.

```php
// User.php
protected $fillable = [
    'name', 'email', 'password', 'is_admin',
];
```

**Role Matrix:**

| Capability | Guest | Registered User | Admin |
|---|:---:|:---:|:---:|
| Read posts | ✅ | ✅ | ✅ |
| Explore topics | ✅ | ✅ | ✅ |
| View creator portfolios | ✅ | ✅ | ✅ |
| Like posts | ❌ | ✅ | ✅ |
| Comment on posts | ❌ | ✅ | ✅ |
| Write & publish posts | ❌ | ✅ | ✅ |
| Save drafts | ❌ | ✅ | ✅ |
| Edit own posts | ❌ | ✅ | ✅ |
| Delete own posts | ❌ | ✅ | ✅ |
| Access Studio | ❌ | ✅ | ✅ |
| Access Admin Panel | ❌ | ❌ | ✅ |
| Manage all users | ❌ | ❌ | ✅ |
| Moderate reported content | ❌ | ❌ | ✅ |
| View system backups | ❌ | ❌ | ✅ |

---

## 🔁 Polymorphic Relationships

One of the most elegant engineering decisions in Echoes is the use of **Laravel polymorphic relationships** for both Likes and Comments. This means both Posts *and* Comments can be liked — with a single `likes` table and zero code duplication.

### How It Works

```
likes table:
┌────┬─────────┬─────────────┬───────────────────┐
│ id │ user_id │ likeable_id │ likeable_type      │
├────┼─────────┼─────────────┼───────────────────┤
│  1 │    3    │      7      │ App\Models\Post    │
│  2 │    3    │      2      │ App\Models\Comment │
└────┴─────────┴─────────────┴───────────────────┘
```

### The Model Chain

```php
// Post.php — Posts can be liked
public function likes() {
    return $this->morphMany(Like::class, 'likeable');
}

// Comment.php — Comments can ALSO be liked
public function likes() {
    return $this->morphMany(Like::class, 'likeable');
}

// Like.php — Points back to whatever it belongs to
public function likeable() {
    return $this->morphTo();
}
```

### The Toggle Controller

```php
// LikeController.php
public function toggleLike(Post $post)
{
    $user = auth()->user();
    $like = $post->likes()->where('user_id', $user->id)->first();

    if ($like) {
        $like->delete();   // Unlike
    } else {
        $post->likes()->create(['user_id' => $user->id]);  // Like
    }

    return back();
}
```

The same pattern applies identically to Comments — future-proof, DRY, and production-ready.

---

## 📸 Key Pages Breakdown

### The Writing Studio (`dashboard.blade.php`)
The heart of the creator experience. A full-page Quill rich text editor with a formatting toolbar supporting headings, bold, italic, code blocks, images, video embeds, ordered/unordered lists, text color, background color, and alignment. The form POSTs to `PostController@store` with image upload support and full validation.

### The Post Reader (`show.blade.php`)
Rendered with Tailwind's `prose` typography plugin for beautiful reading. Includes smart reading-time calculation, a sticky top nav bar, a like toggle button, and a full discussion section with a textarea comment form (auth-gated) and chronological comment thread.

### The Admin Backups Console (`backups.blade.php`)
The showpiece of the admin panel. Alongside real data (backup status, S3 storage, uptime), there's a fully styled **fake terminal console** rendered with GSAP animations — diagnostic lines stream in one-by-one with a stagger delay, giving the impression of a real live system log. Pure craftsmanship.

### The Reports Triage (`reports.blade.php`)
A dark table with a red gradient accent bar. Every reported piece of content arrives here with its ticket ID, target (post/user/comment with emoji icons), violation claim badge, and three action buttons with hover state transitions.

---

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you'd like to change.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'feat: Add AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

---

## 👨‍💻 Author

<div align="center">

**Muhammad Bilal Ifzal**

*Full-Stack Web Developer | Laravel & Frontend Specialist*

[![Upwork](https://img.shields.io/badge/Upwork-Available%20for%20Hire-14a800?style=for-the-badge&logo=upwork&logoColor=white)](https://www.upwork.com)
[![GitHub](https://img.shields.io/badge/GitHub-Follow-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/yourusername)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Connect-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/muhammad-bilal-ifzal-a82649375)

<br/>

*Engineered with* ❤️ *in Pakistan*

</div>

---

<div align="center">

```
© 2026 Echoes Studio. All rights reserved.
```

*If you found this project valuable, please consider leaving a ⭐ on the repository.*

</div>
