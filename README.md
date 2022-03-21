## Using socket.io
<h3 align="center">After clonning this project follow the following instructions</h3>
<ul>
<li>1- Install predis</li>
<code align="center">composer require predis/predis</code>
<li> 2- Update .env file</li>
<code align="center">
BROADCAST_DRIVER=redis
  
DB_DATABASE=laravel
DB_USERNAME=mahedi
DB_PASSWORD=123
  
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
   
LARAVEL_ECHO_PORT=6001
</code>
<li>3- Initialize laravel-echo-server</li>
<code>laravel-echo-server init</code>
<li>Install aravel-echo, socket.io-client</li>
</ul>

