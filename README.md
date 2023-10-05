<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## About Laravel Multi Auth Application

This a multi auth laravel application using 10.x and its having 3 different entities, Admin, Teacher, Student with separate Authentications.

## Clone Repo

Clone this repo using link or download as zip file

## Requirements

``
composer version > 2.x & PHP > 8.2
``

#### Install Dependencies

``
composer install
``

#### Connect Database

``
copy .env.example and create .env after that update your database credentials
``

#### Run Migrate

``
php artisan migrate --seed
``

#### Default Users

- **Admin(admin@devbench.com) &nbsp;&nbsp;&nbsp; & password: 12345678**
- **Teacher(teacher@devbench.com) & password: 12345678**
- **Student(student@devbench.com) & password: 12345678**

#### Role Permissions

- **Admin (admin@devbench.com)**
  - Update profile
  - Delete Account
  - Create/Edit/Delete Courses
- **Teacher(teacher@devbench.com)**
    - Update profile
    - Delete Account
    - Create/Edit/Delete Courses
- **Student(student@devbench.com)**
    - Update profile
    - Delete Account
    - View Courses



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
