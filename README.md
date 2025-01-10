### Property Search Backend

### Clone the project

```bash
git clone https://github.com/KWangechi/property-api-dev-test.git
```

### Install dependencies

```bash
composer install
```

### Copy the .env.example to .env

```bash
cp .env.example .env
```

### Generate an APP_KEY

```bash
php artisan key:generate
```

### Seed and migrate your database tables

```bash
php artisan migrate --seed
```

### Run the application

```bash
php artisan serve
```

### Routing

There are 2 main routes:

1. `/api/searchProperties` - this is where the search is done
2. `/api/properties` - this returns all the data
