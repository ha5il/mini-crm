### Mini CRM on Laravel 8 and Livewire

Project to manage companies and their employees (Mini-CRM)
- [X] Basic Laravel Auth: ability to log in as administrator
- [x] Use database seeds to create first user with email admin@admin.com and password
“password”
- [ ] CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies
and Employees. *(Done for company with resource and Employee with livewire)*
- [X] Companies DB table consists of these fields: Name (required), email, logo (minimum
100×100), website
- [X] Employees DB table consists of these fields: First name (required), last name
(required), Company (foreign key to Companies), email, phone
- [X] Use database migrations to create those schemas above
- [X] Store companies logos in storage/app/public folder and make them accessible from
public *(Do run storage:link)*
- [x] Use basic Laravel resource controllers with default methods – index, create, store etc. *(Done for company resource)*
- [x] Use Laravel’s validation function, using Request classes *(Done for company resource)*
- [ ] Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
- [x] Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to
register *(Used Laravel breeze:install)*
- [ x Use Datatables.net library to show table – with our without server-side rendering *(Done as server side for company resource)*
- [ ] Email notification: send email whenever new company is entered (use Mailgun or Mailtrap). Use laravel scheduler to send email
- [ ] Make the project multi-language (using resources/lang folder)
- [ ] Basic testing with phpunit