Waygook Teacher
=======

Waygook Teacher is a platform to connect Korean students with English teachers.

## Features

* User will register as either a Teacher or a Student. Once registered, the User will
complete their profile and search for suitable Teachers/Students.
* Users can send messages and schedule lessons on the calendar in the app.

## Tasks to complete

* Include payment system (presently operating on PayPal 'sandbox' environment)
* Once Student deposits money for lessons w/ a Teacher, reveal Teacher's skype name
* Once Student confirms that the lessons took place on Skype, send the money to the Teacher's PayPal account
* Improve Korean translation
* Fix site responsiveness

## FOLDER STRUCTURE

waygookteacher
    bin                 (contains command line scripts)
    config              (contains application configuration)
        config.php
    data                (contains sql data and scripts)
    docs                (contains documentation files)
    node_modules        (contains Node.js modules for managing front end)
    public              (contains publicly accessible files at http://waygookteacher.com/)
        index.php
        js              (contains compiled JS)
            main.min.js
        images
        css             (contains compiled SASS)
            style.min.css
    src                 (contains source code files)
        controllers         (performs all operations preparing the data to be retrived/inserted, aka 'the handlers')
            login.php           (controller for logging in a user)
            register.php        (controller for registering a user)
            lesson.php          (controller for scheduling a lesson)
            deposit.php         (controller for making a deposit)
            withdraw.php        (controller for making a withdrawl)
            profile.php         (controller for profile changes)
        models              (performs all operations retrieving/inserting the data)
            User.php            (performs all operations on a specific user)
            Account.php         (performs all operations on a login/register account)
            Payment.php         (performs all operations on specific payment)
            Employment.php      (performs all operations on employment payment. That is, interaction between two Users)
        views               (perform all operations displaying the data)
            modals              (contains all modals)
                loginRegister.php       (modal to login/register) 
                sendMessage.php         (modal to send message)
                scheduleLesson.php      (modal to schedule a lesson)
                depositPayment.php      (modal to deposit money)
                withdrawPayment.php     (modal to withdraw money)
            head.php            (contains all <head></head> contents)
            header.php          (contains all <header></header> contents)
            footer.php          (contains all <footer></footer> contents)
            search.php          (contains search page)
            calendar.php        (contains calendar page)
            message.php         (contains message page)
            payment.php         (contains payment page)
            profile.php         (contains profile page)
    resources           (contains 'raw, uncompiled assets' such as JS, SASS, as well as translation files)
        js                  (contains raw, uncompiled JS code)
            main.js             (compiles -> public/js/main.min.js)
        sass                (contains raw, uncompiled SASS code)
            abstracts           (contains 'helpers' which don't output any CSS when compiled)
                _variables.scss     (SASS variables)
                _functions.scss     (SASS functions)
                _mixins.scss        (SASS mixins)
            base
            components              (contains all styles for all 'widgets')
                _buttons.scss
                _sliders.scss
            layout                  (contains all styles involved with the layout)
                _navigation.scss
                _grid.scss
                _header.scss
                _footer.scss
                _sidebar.scss
                _forms.scss
            pages                   (contains any styles that are specific to individual pages)
                _home.scss
                _about.scss
                _contact.scss
            vendors                 (contains all third party code from external libraries and frameworks)
                _bootstrap.scss
                _jquery.scss
            main.scss               (contains all imports; compiles into public/css/style.min.css)
        translations        (contains all translation files)
            eng.php             (contains English translations)
            kor.php             (contains Korean translations)
    tests               (contains automated tests)
    vendor              (contains Composer dependencies)

