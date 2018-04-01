<?php
$ip = '127.0.0.1';
$port = 25565;

$onlinePlayers = 0;
$maxPlayers = 0;
$serverMotd = '';

$serverSock = @stream_socket_client('tcp://'.$ip.':'.$port, $empty, $empty, 1);


if($serverSock !== FALSE)
{
    fwrite($serverSock, "\xfe");

    $response = fread($serverSock, 2048);
    $response = str_replace("\x00", '', $response);
    $response = substr($response, 2);

    $data = explode("\xa7", $response);

    unset($response);

    fclose($serverSock);

    if(sizeof($data) == 3)
    {
        $serverMotd = $data[0];
        $onlinePlayers = (int) $data[1];
        $maxPlayers = (int) $data[2];
    }
}

?>


<html>
  <head>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script>
                  $( document ).ready(function() {
                                // $('#link').text(location.href.replace(/[^/]*$/, '')+$('#mufile').text());
                  });
          </script>
  <title>EnderIO Test Server</title>
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <div id="app">
      <div id="logo">
        <img src="assets/logo.png" />
      </div>
      <div id="container">
        <div id="header">
          <div>
            <h1>EnderIO Test Server</h1>
            <span id="tagline">"Play to have fun and find bugs"</span>
          </div>

          <div id="server-status">
            <div>
              <img src="assets/logo-square.png" />
            </div>
            <div>
              <strong>
                          <?php echo $serverMotd;
                          ?>
                          </strong>
              <p>
                          <?php
                          echo $onlinePlayers.'/'.$maxPlayers;
                          ?> player(s) online.</p>
              <p>server.enderio.com</p>
            </div>
          </div>
        </div>
        <div id="main">
          <h2>General information</h2>
          <p>
            The testing server is always running the latest development version of EnderIO, so be aware that the server routinely will restart to update to the latest version.<br>
            <i>The world will only be deleted should the mod require that it be.</i>
	    <br>
          </p>
          <h2>Reporting bugs</h2>
          <p>
            Play and have fun, but remember to report the bugs you discover.<br>
            All bugs should be reported in #bug-reports at EnderIO's Discord server.
            </p><div id="discord">
              <div id="discord-logo">
                <img src="assets/discord.png">
              </div>
              <div>
                <a href="http://discord.gg/sgYk3Jr">Join Discord</a>
              </div>
            </div>
          <p></p>
          <h2>Dependencies</h2>
          <p>
            We automatically generate an always up-to-date zip for MultiMC that contains all the dependencies. This instance will crash on the first load due to the updater. Each time you launch the instance it will be updated to use the latest version of the server pack, including mods and configs.
          </p>
          <p><strong><a id="mufile" href="enderiotest_multimc.zip">enderiotest_multimc.zip</a></strong></p>
                  <br>
          <p><i>MultiMC is a free, open source launcher for Minecraft. It allows you to have multiple separated instances of Minecraft. Find out more about MultiMC at <a href="https://multimc.org/#Download">the MultiMC project page</a></i><br></p>
                  <p>Getting started: <a href="https://github.com/MultiMC/MultiMC5/wiki/Getting-Started">https://github.com/MultiMC/MultiMC5/wiki/Getting-Started</a></p><br>
          <p>The server is running <span class="highlight">Minecraft 1.12.2</span> with <span class="highlight">forge-1.12.2-14.23.2.2624</span></p>
	      <h2>Rules</h2>
		<p>Play nice, moderators word is law. Do not use item duplication bugs. Do not abuse AFK tricks for resources. You will at least be kicked, and most likely banned if found doing these things.</p>
	  <h2>Suggestions</h2>
	    <p>If you have any mod suggestions, they must fulfill at least one of the following guidelines:</p>
	      <ul>
	        <li>Ender IO or Ender Zoo has specific integration with that mod.</li>
	        <li>The mod has specific integration with Ender IO or a has a good candidate for it</li>
	        <li>The mod enables testing a specific functionality of Ender IO</li>
	        <li>The mod provides a replacement for a currently broken/missing feature of Ender IO</li>
	        <li>The mod helps keep the server running</li>
	      </ul>
            <p>The mod must also be publicly available for Minecraft 1.12.2. Remember, no begging.</p> 
        </div>
      </div>
      <div id="margin-fix">&nbsp;</div>
    </div>
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
  </body>
</html>
