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
              <p>mc.joduwei.com</p>
            </div>
          </div>
        </div>
        <div id="main">
          <h2>General information</h2>
          <p>
            The testing server is always running the latest development version of EnderIO, so be aware that the server routinely will restart to update to the latest version.<br />
            <i>The world will only be deleted should the mod require that it be.</i>
          </p>
          <h2>Reporting bugs</h2>
          <p>
            Play and have fun, but remember to report the bugs you discover.<br />
            All bugs should be reported in #server-bugreports at EnderIO's Discord server.
            <div id="discord">
              <div id="discord-logo">
                <img src="assets/discord.png" />
              </div>
              <div>
                <a href="http://discord.gg/sgYk3Jr">Join Discord</a>
              </div>
            </div>
          </p>
         <!-- <p class="callout">
            <strong>Before reporting any bugs,</strong> please search and familiarise yourself with the issues that have already been reported.
          </p> -->
          <h2>Dependencies</h2>
          <p>
            We automatically generate an always up-to-date zip for MultiMC that contains all the dependencies.
          </p>
          <p><strong><a id="mufile" href="$mufile">$mufile</a></strong></p>
		  <br />
          <p><i>MultiMC is a free, open source launcher for Minecraft. It allows you to have multiple separated instances of Minecraft. Find out more about MultiMC at <a href="https://multimc.org/#Download">the MultiMC project page</a></i><br /></p>
		  <p>Getting started: <a href="https://github.com/MultiMC/MultiMC5/wiki/Getting-Started">https://github.com/MultiMC/MultiMC5/wiki/Getting-Started</a></p><br />
          <p>The server is running <span class="highlight">Minecraft 1.12.2</span> with <span class="highlight">forge-1.12.2-14.23.2.2613</span></p>
          <ul>
	<li><a href="https://minecraft.curseforge.com/projects/actually-additions/files/2526272/download">journeymap-1.12.2-5.5.2.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/jei/files/2522813/download">jei_1.12.2-4.8.5.147.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/chameleon/files/2450900/download">Chameleon-1.12-4.1.3.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/storage-drawers/files/2522494/download">StorageDrawers-1.12.2-5.3.4.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/mantle/files/2474052/download">Mantle-1.12-1.3.1.21.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/tinkers-construct/files/2518400/download">TConstruct-1.12.2-2.9.0.55.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/the-one-probe/files/2496985/download">theoneprobe-1.12-1.4.19.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/the-middle-torch/files/2514323/download">middletorch-6.0.1.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/refined-storage/files/2515440/download">refinedstorage-1.5.31.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/ftblib/files/2505841/download">FTBLib-4.2.5.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/ftb-utilities/files/2505842/download">FTBUtilities-4.2.4.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/tinkers-tool-leveling/files/2507887/download">TinkerToolLeveling-1.12-1.0.3.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/redstone-flux/files/2448933/download">RedstoneFlux-1.12-2.0.1.2-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/tinker-i-o/files/2523937/download">tinker_io-1.12.2-release 2.6.0a.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/cofhcore/files/2519297/download">CoFHCore-1.12.2-4.3.10.5-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/cofh-world/files/2513671/download">CoFHWorld-1.12.2-1.1.1.12-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/codechicken-lib-1-8/files/2509819/download">CodeChickenLib-1.12.2-3.1.5.331-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/thermal-foundation/files/2518222/download">ThermalFoundation-1.12.2-2.3.10.6-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/thermal-dynamics/files/2518224/download">ThermalDynamics-1.12.2-2.3.10.4-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/thermalexpansion/files/2520117/download">ThermalExpansion-1.12.2-5.3.10.15-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/baubles/files/2518667/download">Baubles-1.12-1.5.2.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/ctm/files/2519601/download">CTM-MC1.12-0.2.3.12.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/chisel/files/2516679/download">Chisel-MC1.12-0.1.1.26.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/chisels-bits/files/2527411/download">chiselsandbits-14.13.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/inventory-tweaks/files/2482481/download">InventoryTweaks-1.63.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/cucumber/files/2520478/download">cucumber-1.12-1.0.4.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/mystical-agriculture/files/2511036/download">mysticalagriculture-1.12-1.6.7.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/zerocore/files/2482156/download">zerocore-1.12-0.1.1.0.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/extreme-reactors/files/2525278/download">ExtremeReactors-1.12.2-0.4.5.46.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/actually-additions/files/2526272/download">ActuallyAdditions-1.12.2-r130.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/mcjtylib/files/2523982/download">mcjtylib-1.12-2.6.3.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/rftools/files/2525541/download">rftools-1.12-7.27.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/aroma1997core/files/2490298/download">Aroma1997Core-1.12.2-1.3.0.2.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/aroma1997s-dimensional-world/files/2440965/download">Aroma1997s-Dimensional-World-1.12-1.3.0.0.b37.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/ender-zoo/files/2484148/download">EnderZoo-1.12.1-1.4.0.49.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/openblocks/files/2525232/download">OpenBlocks-1.12.2-1.7.5.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/openmodslib/files/2525230/download">OpenModsLib-1.12.2-0.11.5.jar</a></li>
	
	
	
	$modEntries
          </ul>
          <p><i>Please note that the links are generated automatically. If your jar files are outdated, you can visit this page.</i></p>
        </div>
      </div>
      <div id="margin-fix">&nbsp;</div>
    </div>
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
  </body>
</html>
