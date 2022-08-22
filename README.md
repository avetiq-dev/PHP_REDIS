# PHP_REDIS
This is an example how to connect Redis via php

# How to use
First you need to install Redis on your server
```
sudo apt install redis-server
redis-server -v
```

After that we need php-radis extension
```
sudo apt install php-redis
```

Now we need to create env.php file
```
cp env.example.php env.php
```

# Queries

Set key-value 
```
methot: post 
url: /set
data: [
key => value
]
```

Get by key
```
methot: get 
url: /get/{key}
```

Remove all keys
```
methot: get 
url: /remove_all
```