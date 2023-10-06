# GitHub Interview Project

Welcome to the documentation for the GitHub Interview Project built using the PHP Pure. This project demonstrates the
basic implementation of CRUD operations of github API in a Console Command.

# Getting Started

## Prerequisites

Before you begin, ensure you have the following software installed:

- PHP (>= 8.1)
- Composer (Dependency Manager for PHP)
- need your token api github

## Take Your TOKEN Api For GitHub
```bash
# First go to your github account and follow this patch
# Settings -> Developer Settings -> personal access token -> Tokens (classic)
# Click on Generate new token (classic) and make a token
# Now
# Go to .env in the root of the project and write like this
GITHUB_ACCOUNT_USERNAME='roshandelpoor'
GITHUB_ACCOUNT_CLASSIC_TOKEN='ghp_XSYfwsh7OseZBMgl8rEmMYPXhc4r61VBsu'
```

# Installation And Run as Docker

1- Clone this repository to your local machine:

```bash
git clone https://github.com/roshandelpoor/github-interview-project.git
OR
git clone git@github.com:roshandelpoor/github-interview-project.git

cd github-interview-project
```

2- [ Install Dependencies as Docker: ]

```bash
# First -> Build and run
sudo docker-compose up --build
# Next time -> Only run
sudo docker-compose up -d
# Down Container
sudo docker-compose down
```

2- [ HealthCheck ]

```bash
# HealthCheck
sudo docker-compose exec web curl http://localhost:8000
```

3- Run Application as Console CLI

```bash
# list of All repositories
sudo docker-compose exec web curl http://localhost:8000/github/repositories
# with Filter Name Repository
sudo docker-compose exec web curl http://localhost:8000/github/repositories/username=roshandelpoor
```

```bash
sudo docker-compose exec web php command list                               # list Command Console 
sudo docker-compose exec web php command repository:add interview_create    # Add NEW Repository in Your Account github
sudo docker-compose exec web php command repository:delete interview_create # Delete the Repository in Your Account github
```


4- [ Run Test ]

```bash
sudo docker-compose exec web composer run-script test
```

# Installation And Run Locally

1- Clone this repository to your local machine:

```bash
git clone https://github.com/roshandelpoor/github-interview-project.git
OR
git clone git@github.com:roshandelpoor/github-interview-project.git

cd github-interview-project
```

1- Install Dependencies:

```bash
composer install
```

2- [ HealthCheck ] Run Application as Web and show url http://localhost:8000/

```bash
# HealthCheck
php -S localhost:8000
# and
# after it
# show url http://localhost:8000/
```

3- Run Application as Console CLI And Web

```php
# list of All repositories
See On Web Brower --> http://localhost:8000/github/repositories
# with Filter Name Repository
See On Web Brower --> http://localhost:8000/github/repositories/username=roshandelpoor
```

```bash
php command list                               # list Command Console 
php command repository:add interview_create    # Add NEW Repository in Your Account github
php command repository:delete interview_create # Delete the Repository in Your Account github
```

4- [ Run Test ]

```bash
composer run-script test
```
