# phprouter 

## Latest news:

### LATEST NEWS ITEM:
- I added pseudo-templating. Its nothing like templating engine i created for my old project and intend to re-create and improve, but its still something. Im doing these mvc php frameworks as side projects, i dont even use LAMP stack anymore, but i must admit, its hell of a fun to code in PHP... but its been some time since i wrote some PHP so i need some warmup... there will be some standalone components (router, templating engine, other components) and their variations coming, then ill combine it all into one, great PHP-written MVC framework. For fun, because i feel like writing in this language, thats why.

### PREVIOUS NEWS ITEMS:
- EDIT: Done. Btw i know that you could use DB to achieve that (or even websockets). But thats the challenge and beauty of it that you want to count active users by counting sess temp files but then again you dont want false positives (like thers 1000 sess files but thers 10 people active during last 5 minutes). Solving problems like that is my idea of fun...
- I added online counting users (within last 5 minutes and without any false positives). This was my idea completely and pretty clever, basically we count all sess files, but the are many of false positives, so we check for access/modification time and compare within last 5 minutes </br> </br>
Of course for it to work we also need middleware, that does some stupid action on every request, here is stupid action:
```php
public static function onEveryRequestMiddleware(){
    static::start();
    static::set("_cache", (string)time());
}
```
- Now, in the next routing project ill have middleware and i want to combine this old idea of mine with the router that has middleware. </br>
- In this project i think were mostly done, but idk, maybe ill add something to it, but for me its finished and we continue work in the next project...




## how to start server
ok well use such command to start a server:
```sh
php -S localhost:8000 -t public/
```
Its because i have this project in xampp. so there would be difference between folder structure and the uri</br>
Like url from routes is "/" and the url in project is "localhost/projectfolder/". </br>

## EDIT: Some background:
Some time ago i did 3 projects (not mine) on making PHP MVC framework. Then i used those projects and my own ideas to create my own MVC PHP framework project </br>
Then i focused more on other things including other programming languages and using frameworks rather than writing my own </br>
Now im re-visiting the concept and start with simple router for framework </br>
This router needs to be better i need middleware support and some more cleaver and readable way for route method </br>
I also need some type of db connection, session and cookies support, do it in composer project with proper autoloading, templating engine and so on </br>
I did it all in my old project but it was some time since i coded OOP pure-php code and i need some warmup before i start re-creating it and improving </br>
It was challenging project i barely got working and barely understood back then. Since then i havent coded much in pure-php oop. So i need some warmup </br>
I do it totally in my free time, when i dont focus on languages i learn/use mostly right now. But there will be more project with the aim to make great php-written mvc framework. </br>
## Thoughts (TODO next project):
- In next iteration there will be middleware
- In next iteration session will be solved using middleware
- In next iteration routing code will be cleaner
- In next iteration there will be composer project and better bootstraping of the project
- Ive done all of that doing MVC framework long time ago but i need to refresh my pure-PHP OOP knowledge
- Remember to add composer script to run server with one command
- Well try to do templating engine as side project and then combine with the router
## Before creation (old readmemd):
Ive already done huge mvc framework project that was basically 3 other (not mine) projects combined + my own ideas </br>
Still it was long time ago and i want to re-visit the concept. </br>
Here ill do simple router (without even middleware i guess) </br>
There will be some mini-project like that and then ill think how to connect things so that i have a framework in a form i think is the best </br>
And most of all - i understand everything and it was no-brainer for me </br>
I guess ill need to implement:
- Session
- Router class
- Some helper functions
- Some autoloading feature
- Controller to show off it works
- htaccess 

