## Using socket.io
<h3 align="center">After clonning this project follow the instructions below</h3>
<ul>
<li>1- Install predis</li>
<code>composer require predis/predis</code>
<li> 2- Update .env file</li>
<code>BROADCAST_DRIVER=redis</code>
<code>DB_DATABASE=laravel</code>
<code>DB_USERNAME=mahedi</code>
<code>DB_PASSWORD=123</code>
<code>REDIS_HOST=127.0.0.1</code>
<code>REDIS_PASSWORD=null</code>
<code>REDIS_PORT=6379</code>
<code>LARAVEL_ECHO_PORT=6001</code>
<li>3- Initialize laravel-echo-server</li>
<code>laravel-echo-server init</code>
<li>4- Install laravel-echo, socket.io-client</li>
<code>npm install</code>
<code>npm install laravel-echo</code>
<code>npm install socket.io-client</code>
<li>4-  run npm run command:</li>
<code>npm run dev</code>
</ul>

