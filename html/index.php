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
            <span id="tagline">"Play, have fun and find bugs"</span>
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
          <p><strong><a href="$mufile">$mufile</a></strong></p><br />
          <p><i>MultiMC is a free, open source launcher for Minecraft. It allows you to have multiple separated instances of Minecraft. Find out more about MultiMC at <a href="https://multimc.org">the MultiMC project page</a></i></p><br />
          <p>The server is running <span class="highlight">Minecraft 1.11.2</span> with <span class="highlight">forge-1.11.2-13.20.1.2588</span></p>
          <ul>
	<li><a href="https://minecraft.curseforge.com/projects/jei/files/2453428/download">jei_1.11.2-4.5.0.294.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/journeymap/files/2498301/download">journeymap-1.11.2-5.5.2.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/storage-drawers/files/2432437/download">StorageDrawers-1.11.2-4.2.9.jar</a></li>
        <li><a href="https://minecraft.curseforge.com/projects/tinkers-construct/files/2451489/download">TConstruct-1.11.2-2.7.1.34.jar</a></li>
        <li><a href="https://minecraft.curseforge.com/projects/the-one-probe/files/2469332/download">theoneprobe-1.1x-1.4.18.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/mantle/files/2413993/download">Mantle-1.11.2-1.2.0.26.jar</a></li>
        <li><a href="https://minecraft.curseforge.com/projects/chameleon/files/2419176/download">Chameleon-1.11.2-3.1.0.jar</a></li>
        <li><a href="https://minecraft.curseforge.com/projects/compatlayer/files/2511880/download">compatlayer-1.11.2-0.3.0.jar</a></li>
        <li><a href="https://minecraft.curseforge.com/projects/the-middle-torch/files/2514321/download">middletorch-5.0.7.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/refined-storage/files/2450975/download">refinedstorage-1.4.20.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/ftblib/files/2422883/download">FTBLib-1.1x-3.6.5.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/ftb-utilities/files/2422884/download">FTBUtilities-1.1x-3.6.5.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/tinkers-tool-leveling/files/2424685/download">TinkerToolLeveling-1.11.2-1.0.1.jar</a></li>


	<li><a href="https://minecraft.curseforge.com/projects/thermal-dynamics/files/2489725/download">ThermalDynamics-1.11.2-2.2.7.16-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/thermalexpansion/files/2489699/download">ThermalExpansion-1.11.2-5.2.7.30-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/codechicken-lib-1-8/files/2509809/download">CodeChickenLib-1.11.2-3.0.0.328-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/thermal-foundation/files/2453220/download">ThermalFoundation-1.11.2-2.2.5.16-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/cofhcore/files/2469613/download">CoFHCore-1.11.2-4.2.8.16-universal.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/baubles/files/2458753/download">Baubles-1.11-1.4.6.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/chisels-bits/files/2483469/download">chiselsandbits-13.14.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/inventory-tweaks/files/2431301/download">InventoryTweaks-1.62.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/mystical-agriculture/files/2487658/download">mysticalagriculture-1.11.2-1.5.9.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/zerocore/files/2482155/download">zerocore-1.11.2-0.1.1.0.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/extreme-reactors/files/2525277/download">ExtremeReactors-1.11.2-0.4.5.46.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/actually-additions/files/2435257/download">ActuallyAdditions-1.11.2-r110.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/rftools/files/2511881/download">rftools-1.1x-7.16.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/mcjtylib/files/2511876/download">mcjtylib-1.1x-2.5.1.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/aroma1997s-dimensional-world/files/2412522/download">Aroma1997s-Dimensional-World-1.11.2-1.3.0.0.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/aroma1997core/files/2412506/download">Aroma1997Core-1.11.2-1.2.0.0.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/ender-zoo/files/2427513/download">EnderZoo-1.11.2-1.3.0.47.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/openblocks/files/2514378/download">OpenBlocks-1.11.2-1.7.4.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/chisel/files/2511501/download">Chisel-MC1.11.2-0.1.1.31.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/ctm/files/2485008/download">CTM-MC1.11.2-0.2.3.14.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/mod-name-tooltip/files/2408205/download">modnametooltip_1.11-1.7.1.jar</a></li>
	<li><a href="https://minecraft.curseforge.com/projects/openmodslib/files/2514374/download">OpenModsLib-1.11.2-0.11.4.jar</a></li>
	
	
	
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
