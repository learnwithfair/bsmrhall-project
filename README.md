# BSMRHALL-PROJECT

[![Youtube][youtube-shield]][youtube-url]
[![Facebook][facebook-shield]][facebook-url]
[![Instagram][instagram-shield]][instagram-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

Thanks for visiting my GitHub account!

<img src ="https://pngimg.com/uploads/php/php_PNG10.png" height = "200px" width = "180px"/> **Hypertext Preprocessor (PHP)** is a general-purpose scripting language geared towards web development. It was created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group. PHP was originally an abbreviation of Personal Home Page, but it now stands for the recursive initialism PHP: Hypertext Preprocessor.

### See More

- Visit-> https://www.w3schools.com/php/php_intro.asp
- Visit -> https://www.tutorialspoint.com/php/index.htm

### [Code-Example](https://github.com/learnwithfair/PHP-Code)

## Source Code (Download)

[Click Here](https://mega.nz/file/BKsXSTJS#xhj0GD_GSpm7Y8XiLdBudG7T12kdC6tvT5I9gVkW5k8)

## Required Software (Download)

- VS Code, Download ->https://code.visualstudio.com/download
- Xampp, Download ->https://www.apachefriends.org/download.html

## Objectives

**The main objectives of this project are-**

- To allow for the creation and management of student profiles, facilitating the allocation
  of rooms, and keeping track of student details.
- To provide automated room allocation based on various criteria, such as student
  preferences, special requirements, and availability, simplifying the assignment process.
- To provide efficient management of student housing fees, enabling online payments
  and providing students with billing information.
- To turn on meals at dining for food.
- To report maintenance issues and request services, ensuring a quick response and
  resolution.
- To implement security measures, such as access control systems and monitoring, to
  enhance the safety of university halls.
- To provide a communication platform for Residential students and administrators to
  send and receive messages, updates, and notifications.
- To provide clearance about the residential students if necessary.
- To generate the token system about residential students with a QR code generator.
- To download student's information and processing history with Excel file.

## Activity Diagram

|                              |
| :--------------------------: |
| ![roadmap](screenshot/1.jpg) |

## Project Features

|                               |                               |
| :---------------------------: | :---------------------------: |
| ![roadmap](screenshot/2.jpg)  | ![roadmap](screenshot/3.jpg)  |
| ![roadmap](screenshot/4.jpg)  | ![roadmap](screenshot/5.jpg)  |
| ![roadmap](screenshot/6.jpg)  | ![roadmap](screenshot/7.jpg)  |
| ![roadmap](screenshot/8.jpg)  | ![roadmap](screenshot/9.jpg)  |
| ![roadmap](screenshot/10.jpg) | ![roadmap](screenshot/11.jpg) |
| ![roadmap](screenshot/12.jpg) | ![roadmap](screenshot/13.jpg) |
| ![roadmap](screenshot/14.jpg) | ![roadmap](screenshot/15.jpg) |

## Template Includes

- HTML
- CSS
- PHP
- MySQL
- Bootstrap
- JQuery

## How to use this Project

- Step-1: Clone this repository in your local machine using `gh repo clone learnwithfair/bsmrhall-project `
- Step-2: Put the **bsmrhall** directory in the `C:\xampp\htdocs` folder.
- Step-3: Create two database named **previous_data** and **student_info** in the `http://localhost/phpmyadmin/ `
- Step-4: Import the database file in the both Database respectively.
- Step-5: Run this project in the browser using `url-> http://localhost/bsmrhall `
- Step-6: For login Dashboard using url -> `http://localhost/bsmrhall/admin `
- Step-7: Admin Login Info-

```php
Email: provost@gmail.com
Password: 123456
```

## Configuration (If Needed)

1. bsmrhall/class/function.php

```php

        $bdhost = "localhost";
        $dbuser      = "root";
        $dbpassword  = "";
        $this->conn1 = mysqli_connect( $bdhost, $dbuser, $dbpassword, "student_info" );
        $this->conn2 = mysqli_connect( $bdhost, $dbuser, $dbpassword, "student_info" );
        if ( !( $this->conn1 ) ) {
            die( "Database connection Error!!" );
        }
        if ( !( $this->conn2 ) ) {
            die( "Database connection Error!!" );
        }

```

2. bsmrhall/admin/class/function.php

```php

        $bdhost        = "localhost";
        $dbuser        = "root";
        $dbpassword    = "";
        $dbname        = "student_info";
        $this->conn    = mysqli_connect( $bdhost, $dbuser, $dbpassword, $dbname );
        $this->preconn = mysqli_connect( $bdhost, $dbuser, $dbpassword, "previous_data" );
        if ( !( $this->conn ) ) {
            die( "Database connection Error!!" );
        }

```

3. bsmrhall/pdf/connection.php

```php

        $bdhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "student_info";
        $this->conn = mysqli_connect( $bdhost, $dbuser, $dbpassword, $dbname );
        $this->preconn = mysqli_connect( $bdhost, $dbuser, $dbpassword, "previous_data" );
        $this->conn3 = mysqli_connect( $bdhost, $dbuser, $dbpassword, "student_info" );
        if ( !( $this->conn ) ) {
            die( "Database connection Error!!" );
        }
        if ( !( $this->conn3 ) ) {
            die( "Database connection Error!!" );
        }
```

## Follow Me

[<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/github.svg' alt='github' height='40'>](https://github.com/learnwithfair) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/facebook.svg' alt='facebook' height='40'>](https://www.facebook.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/instagram.svg' alt='instagram' height='40'>](https://www.instagram.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/twitter.svg' alt='twitter' height='40'>](https://www.twiter.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/youtube.svg' alt='YouTube' height='40'>](https://www.youtube.com/@learnwithfair)

<!-- MARKDOWN LINKS & IMAGES -->

[youtube-shield]: https://img.shields.io/badge/-Youtube-black.svg?style=flat-square&logo=youtube&color=555&logoColor=white
[youtube-url]: https://youtube.com/@learnwithfair
[facebook-shield]: https://img.shields.io/badge/-Facebook-black.svg?style=flat-square&logo=facebook&color=555&logoColor=white
[facebook-url]: https://facebook.com/learnwithfair
[instagram-shield]: https://img.shields.io/badge/-Instagram-black.svg?style=flat-square&logo=instagram&color=555&logoColor=white
[instagram-url]: https://instagram.com/learnwithfair
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=flat-square&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/company/learnwithfair
