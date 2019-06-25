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

#### Test

---
## Authors
* **Alan Godoi** - *Initial work* - [AlanGodoi](https://github.com/alangodoi)


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
