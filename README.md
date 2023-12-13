### Project Setup

First Clone the repository:

```bash
git clone https://github.com/sohan065/ras_hi_tech_exam.git

```

Go to the project directory.

```bash
cd ras_hi_tech_exam
```

Install the composer & npm dependencies.

```bash
composer install
```

#### Env Configuration.

Copy the `.env.example` file to `.env` and update the database credentials.

```bash
cp .env.example .env
```

Generate artisan key.

```bash
php artisan key:generate
```

#### Database Migration & Seeding.

Configure your database in `.env` file.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

Then run the database migration command to create the tables.

```bash
php artisan migrate
```

Run the server.

```bash
php artisan serve
```

It will serve the app on `http://127.0.0.1:8000` by default.

### user create

1.Click Sign Up
2.enter your name,mail and password then click submit
3.after submit form then you will redirect into log in page
4.enter your mail which you provided during sign up
5.enter your password which you provided during sign up
6.Click log In
7.after log in you will get your dash board
8.click create post and provide necessary credentials for post
9.click home and see your post
10.you can edit delete active deactive and filter your post from dashboard
