Waygook Teacher
=======

Waygook Teacher is a platform to connect Korean students with English teachers.

## Features

* The website is translated into both English and Korean

## Notes

### Pages that Teachers can't view

* index-student.php
* search.php

### Pages that Students can't view

* index-teacher.php

### Stage 1 (Jan/19 - Aug/19)

* create profile
* search (by filter) for profile
* message profile to arrange lesson

#### Feb Tasks

* improve appearance of profile.php (include more fields)
* include filter functionality in search.php [X]
* include settings.php
    ** changing email, password, name, etc. should be done in Profile.php
    ** changing password, notification settings, account verification should be done in Settings.php
* WORKFLOW:
    1) Users registers as either Teacher or Student
    2) If as Teacher,
        3.1) Direct to Teacher-index,
        3.2) Information about completing profile (description + pic),
        3.3) Search for Students or WAIT till Student sends a message???
    3) If as Student,
        3.1) Direct to Student-index
        3.2) Information about search for Teachers,
        3.3) Send Teacher a message to organise a lesson,

### Stage 2 (Aug/19 - Oct/19)

* lesson adjudication (review)
* payment (release Skype details over payment completed)
* release payment to Teacher after Student confirms (and reviews) lesson

### Stage 3 (Oct/19 - Jan/20)

* Skype (/video calling) integration
