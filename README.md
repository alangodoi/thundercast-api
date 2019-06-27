## Thundercast API

Create your own Podcast API

#### Clone this repo
```bash
cd /your/desired/project/path
git clone https://github.com/alangodoi/thundercast-api.git
```

#### Create a database
```bash
mysql -u username -p
```

```mysql
CREATE DATABASE databasename
```

#### Configure .env
```bash
cd /path/to/your/cloned/project/thundercast
cp .env.example .env
vim .env
```

###### Configure MySQL Connection
```PHP
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=databasename
DB_USERNAME=username
DB_PASSWORD=password
```

#### Install dependencies
```bash
composer install
```

#### Run the migrations
```bash
php artisan migrate
```

#### How To

Insert xml feed urls into table `upcomings` then run the laravel command below, this will fill the tables podcasts and episodes

```bash
php artisan podcast:update
```

* When you run the migrations, some urls will be added by default, see the [code](database/migrations/2019_06_25_013903_create_table_upcomings.php)

##### Routes

    GET api/upcoming
    GET api/podcasts
    GET api/episodes

---
## Authors
* **Alan Godoi** - *Initial work* - [AlanGodoi](https://github.com/alangodoi)

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
