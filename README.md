# Carib Karaoke

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat&logo=php&logoColor=white)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-violet.svg)](LICENSE)

A Caribbean karaoke song search web app. Search the library, save your favourite songs, and let the admin team keep the catalogue up to date.

## Features

- **Live Song Search** — Search by song title, artist, genre, or brand with real-time debounced results
- **Favourites** — Save and manage your personal list of favourite songs
- **Admin Panel** — Filament dashboard for managing songs, artists, genres, and brands
- **Authentication** — Registration, login, password reset, email verification, and 2FA via Laravel Fortify

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 |
| Frontend | Livewire 4, Alpine.js, Tailwind CSS 4 |
| Admin | Filament 5 |
| Auth | Laravel Fortify + Sanctum |
| Search | Laravel Scout + TNTSearch |
| Testing | Pest 3 |
| PHP | 8.3+ |

## Getting Started

### Requirements

- PHP 8.3+
- Composer
- Node.js & npm
- A database (MySQL, PostgreSQL, or SQLite)

### Installation

```bash
# Clone the repository
git clone https://github.com/ShamarKellman/carib-karaoke.git
cd carib-karaoke

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Set up environment
cp .env.example .env
php artisan key:generate

# Configure your database in .env, then run migrations
php artisan migrate --seed

# Build frontend assets
npm run build

# Start the development server
composer run dev
```

## Development

```bash
# Run tests
php artisan test --compact

# Format code
vendor/bin/pint

# Watch for changes
npm run dev
```

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/my-feature`)
3. Make your changes and write tests
4. Ensure all tests pass (`php artisan test --compact`)
5. Format your code (`vendor/bin/pint`)
6. Open a pull request

Please open an issue first for significant changes so we can discuss the approach before you invest time building it.

## License

This project is open-sourced under the [MIT license](LICENSE).
