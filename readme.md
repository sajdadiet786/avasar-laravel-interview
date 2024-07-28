# Laravel 5.5 based system for managing expenses and income

**Notice: we've released newer version of this project, based on Laravel 6 and CoreUI Theme. [Click here](https://github.com/LaravelDaily/QuickAdminPanel-ExpenseManager)**.

It is a demo project for demonstrating what can be generated with [QuickAdminPanel](https://quickadminpanel.com) tool.

Features:

- CRUDs for income/expenses and their categories
- Monthly reports by income/expenses and their categories
- Multi-tenancy: Ability to register new user who sees only their categories/entries (admin sees all).
- Formatting currency: ability to add/edit currencies with their formats (comma/dot separation etc.)

## Clickable live-demo

[demo-expenses.quickadminpanel.com](http://demo-expenses.quickadminpanel.com)

- **Email**: sajda@mailinator.com
- **Pass**: 12345678

![Expense manager screenshot](https://quickadminpanel.com/assets/pages/demos/demo-expenses-01.png)

![Expense manager screenshot currency](https://quickadminpanel.com/assets/pages/demos/demo-expenses-02.png)

## How to use

- Clone the repository with **git clone**
- Copy **.env.example** file to **.env** and edit database credentials there
- Run **composer install**
- Run **php artisan key:generate**
- Run **php artisan migrate --seed** (it has some seeded data for your testing)
- That's it: launch the main URL and login with default credentials __sajda@mailinator.com__ - **12345678**

## License

Basically, feel free to use and re-use any way you want.

---

## More from our LaravelDaily Team

- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
- Read our [Blog with Laravel Tutorials](https://laraveldaily.com)
- FREE E-book: [50 Laravel Quick Tips (and counting)](https://laraveldaily.com/free-e-book-40-laravel-quick-tips-and-counting/)
- Subscribe to our [YouTube channel Laravel Business](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
