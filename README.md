## Using socket.io
<h3 align="center">After clonning this project follow the instructions below</h3>
<ul>
<li>1- Install predis</li>
<code><h4>composer require predis/predis</h4></code>
<li> 2- Update .env file</li>
<code><h4>BROADCAST_DRIVER=redis</h4></code>
<code><h4>DB_DATABASE=laravel</h4></code>
<code><h4>DB_USERNAME=mahedi</h4></code>
<code><h4>DB_PASSWORD=123</h4></code>
<code><h4>REDIS_HOST=127.0.0.1</h4></code>
<code><h4>REDIS_PASSWORD=null</h4></code>
<code><h4>REDIS_PORT=6379</h4></code>
<code><h4>LARAVEL_ECHO_PORT=6001</h4></code>
<li>3- Initialize laravel-echo-server</li>
<code><h4>laravel-echo-server init</h4></code>
<li>4- Install laravel-echo, socket.io-client</li>
<code><h4>npm install</h4></code>
<code><h4>npm install laravel-echo</h4></code>
<code><h4>npm install socket.io-client</h4></code>
<li>4-  run npm run command:</li>
<code><h4>npm run dev</h4></code>
</ul>

