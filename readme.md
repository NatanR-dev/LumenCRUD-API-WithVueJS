# Lumen CRUD API

A clean, modular, and RESTful API built with Lumen, focused on scalable and maintainable backend architecture.

## Features

- RESTful endpoints for Notes resource (CRUD)
- Modular route organization
- Clean code, ready for integration with any front-end (Vue, React, Angular, etc.)
- Example HTTP requests included in `Request.http`
- Ready for deployment and further extension

## Getting Started

1. Clone the repository:
   ```sh
   git clone git@github.com:NatanR-dev/LumenCRUD-API.git
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Configure your environment variables (`.env`)
4. Run migrations and seeders:
   ```sh
   php artisan migrate --seed
   ```
5. Start the server:
   ```sh
   php -S localhost:8000 -t public
   ```

## API Endpoints

- `GET    /notes`           — List all notes
- `GET    /notes/{id}`      — Get a specific note
- `POST   /notes`           — Create a new note
- `PUT    /notes/{id}`      — Update a note
- `PATCH  /notes/{id}`      — Partially update a note
- `DELETE /notes/{id}`      — Delete a note

See `Request.http` for ready-to-use request examples.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
