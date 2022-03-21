## Using socket.io
<h3 align="center">After clonning this project follow the instructions below</h3>
<ul>
<li>1- Install predis</li>
<h4>composer require predis/predis</h4>
<li> 2- Update .env file</li>
<h4>BROADCAST_DRIVER=redis</h4>
<h4>REDIS_HOST=127.0.0.1</h4>
<h4>REDIS_PASSWORD=null</h4>
<h4>REDIS_PORT=6379</h4>
<h4>LARAVEL_ECHO_PORT=6001</h4>
<li>3- Initialize laravel-echo-server</li>
<h4>laravel-echo-server init</h4>
<li>4- Install laravel-echo, socket.io-client</li>
<h4>npm install</h4>
<h4>npm install laravel-echo</h4>
<h4>npm install socket.io-client</h4>
<li>4-  run npm run command:</li>
<h4>npm run dev</h4>
</ul>

