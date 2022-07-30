# Codeigniter4-Mysql-Docker
Create docker container for Codeigniter 4.2.1

#### CodeIgniter 4 – Step 1: Let’s make some Docker containers ####
Started by making the following directory structure

Codeigniter4-Mysql-Docker
  - db_data
  - docker
      - apache
      - mysql
  - src

Now,create “docker-compose.yml”, which we will put in our project folder (in our case “Codeigniter4-Mysql-Docker”).


<img width="665" alt="Screen1" src="https://user-images.githubusercontent.com/83863431/181908051-3eb2cd42-4564-458d-a9d3-f00a34e93ca2.png">

let’s create "Dockerfile"  in “docker/mysql”.

<img width="203" alt="Screen2" src="https://user-images.githubusercontent.com/83863431/181908284-46f037f6-5b33-436a-9531-64a7cd29cffe.png">

<img width="498" alt="Screen3" src="https://user-images.githubusercontent.com/83863431/181908292-c2a7b6e7-d895-4e46-adc0-8ede614b8bc6.png">

Create “.env” file in our project folder (in our case “Codeigniter4-Mysql-Docker”).

<img width="284" alt="Screen4" src="https://user-images.githubusercontent.com/83863431/181908486-721a6454-cb1e-4734-b8b3-a9ca4b2972fa.png">


Create the “src” local directory for its “var/www/html” directory. We will use the 80 port for communicating between our computer and the server and we’ve let the Apache to depend and to be linked to the “db” service.

Now, let’s also look to our other “Dockerfile”, the one that we’ve told Docker to use for Apache and PHP. Let’s create it in “docker/apache” directory and put the following in:

<img width="200" alt="Screen5" src="https://user-images.githubusercontent.com/83863431/181908619-a2d81f1c-6f31-41ad-b55a-b9eda6339e6b.png">
<img width="617" alt="Screen6" src="https://user-images.githubusercontent.com/83863431/181908771-b6e017d6-0669-442e-ad70-8438d881905b.png">
<img width="1000" alt="Screen 7" src="https://user-images.githubusercontent.com/83863431/181908781-911f3c90-408c-42cc-a105-0c32547bc442.png">


So… we will use Apache with PHP 7.4, we will name our server localhost, and we start by updating and installing some needed PHP extensions. After that, we establish a new apache config file which we create in “docker/apache” directory.

After this, we install Composer, we copy everything we find from our local “src” directory into the containers “/var/www/html” directory.

let’s create a file “000-default.conf” into our “docker/apache” directory and put the following into it:
<img width="359" alt="Screen 8" src="https://user-images.githubusercontent.com/83863431/181908861-429ec727-32f3-4da2-95ae-f5e3999dcd8c.png">

OK. Done. Now, if we go to our “Codeigniter4-Mysql-Docker” and do a “docker-compose up” in our terminal, all our stack should be built, and we can go to work. if we go to http://localhost:8088, we will have access to Adminer.
Now everything should be ok, with web, db and adminer services created.

#### CodeIgniter 4 – Step 2: Installing CodeIgniter in Docker containers ####

Now, we need to go into the terminal of our “web” service in order to “install” CodeIgniter4.

To do this, we first need to know how the container is named. So type in the terminal “docker ps “. As you may see, our container name is “codeigniter4-mysql-docker_web_1“.

In order to get into the terminal of that container we only need to write: “docker exec -it codeigniter4-mysql-docker_web_1 bash “. And that’s it: we are in the container’s terminal.

Now, in the container’s terminal we simply write: “composer create-project codeigniter4/appstarter ./ “; and composer should start installing our CodeIgniter4 application.


<img width="756" alt="Screen9" src="https://user-images.githubusercontent.com/83863431/181909179-945bc23f-c305-4078-b7fa-cf68ac4a53b0.png">

Now, if you go in your browser to http://localhost you should see the CodeIgniter starter app.
If it doesn’t appear? Maybe we don’t have read write rights. Then go inside wsl, in your directory and type: sudo chmod 777 ./ -R

<img width="514" alt="Screen10" src="https://user-images.githubusercontent.com/83863431/181909296-e2a237d8-ad19-451b-a404-5f9e365d321e.png">

God Bless You!
