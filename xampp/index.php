<?php
include( "./inc/Scripts/functions.php" );
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>XAMPP Web Panel</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
</head>
<body>
<div class="ui container" style="margin: 25px;">
    <div class="ui grid segment">
        <h2 class="ui icon header vertical aligned"> <img src="inc/img/132x_icon.png" width="128" height="128" class="ui rounded image" alt="logo">
            <div class="content"> XAMPP Web Panel V0.0.1 </div>
        </h2>
    </div>
<div class="ui menu">
  <a class="active item"><i class="wrench icon"></i> Config</a>
  <a class="item"><i class="globe icon"></i> Netstat</a>
	<a class="item"><i class="terminal icon"></i> Shell</a>
	<a class="item"><i class="folder outline icon"></i> Explorer</a>
  <a class="item"><i class="desktop icon"></i> Services</a>
  <a class="item"><i class="question circle icon"></i> Help</a>
  <a class="item"><i class="stop circle icon"></i> Exit</a>
  <div class="right menu">
    <div class="item">
      <div class="ui transparent icon input">
        <input type="text" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>
  </div>
</div>
    <div class="twelve wide column">
      <table class="ui celled table" >
        <tbody>
        <thead>
          <tr>
            <th scope="col">Module</th>
            <th scope="col">PID(s)</th>
            <th scope="col">Port(s)</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
		<tr>
          <form method="post">
                    <?php $apacheRunning = isApacheRunning(); ?>
                    <td class="<?php echo $apacheRunning ? 'positive' : 'error'; ?>"><h4>Apache</h4></td>
                    <td><?php echo getApachePIDs(); ?></td>
                    <td><?php echo getApachePorts(); ?></td>
                    <td><div class="ui icon buttons">
                            <?php if ($apacheRunning) : ?>
                            <button type="submit" name="start_stop" class="ui button red"><i class="stop icon"></i>Stop</button>
                            <?php else : ?>
                            <button type="submit" name="start_stop" class="ui button green"><i class="play icon"></i>Start</button>
                            <?php endif; ?>
                            <button type="submit" name="admin" class="ui button"><i class="users icon"></i>Admin</button>
                            <button class="ui button"><i class="edit icon"></i>Config</button>
                            <div class="ui floating dropdown icon button"> <i class="dropdown icon"></i>
                                <div class="menu"> <a class="item" onclick="openConfig('httpd.conf')">Apache (httpd.conf)</a> <a class="item" onclick="openConfig('httpd-ssl.conf')">Apache (httpd-ssl.conf)</a> <a class="item" onclick="openConfig('httpd-xampp.conf')">Apache (httpd-xampp.conf)</a> <a class="item" onclick="openConfig('php.ini')">PHP (php.ini)</a> <a class="item" onclick="openConfig('config.inc.php')">phpMyAdmin (config.inc.php)</a>
                                    <div class="divider"></div>
                                    <a class="item" onclick="browseFolder('apache')">Browse [Apache]</a> <a class="item" onclick="browseFolder('php')">Browse [PHP]</a> <a class="item" onclick="browseFolder('phpmyadmin')">Browse [phpMyAdmin]</a> </div>
                            </div>
                        
                       <button type="submit" name="logs" class="ui button"><i class="file alternate outline icon"></i>Logs</button>
					</div>
				  </td>
                
            </form>
        </tr>
        <tr>
          <form method="post">
                    <?php $mysqlRunning = isMySQLRunning(); ?>
                    <td class="<?php echo $mysqlRunning ? 'positive' : 'error'; ?>"><h4>MySQL</h4></td>
                    <td><?php echo getMySQLPIDs(); ?></td>
                    <td><?php echo getMySQLPorts(); ?></td>
                    <td><div class="ui icon buttons">
                            <?php if ($mysqlRunning) : ?>
                            <button type="submit" name="start_stop_mysql" class="ui button red"><i class="stop icon"></i>Stop</button>
                            <?php else : ?>
                            <button type="submit" name="start_stop_mysql" class="ui button green"><i class="play icon"></i>Start</button>
                            <?php endif; ?>
                            <button type="submit" name="admin_mysql" class="ui button"><i class="users icon"></i>Admin</button>
                            <button class="ui button"><i class="edit icon"></i>Config</button>
                            <div class="ui floating dropdown icon button"> <i class="dropdown icon"></i>
                                <div class="menu"> 
                                    <!-- IMPLEMENT CONFIG DROPDOWN --> 
                                </div>
                            </div>
                            <button type="submit" name="logs_mysql" class="ui button"><i class="file alternate outline icon"></i>Logs</button>
                        </div></td>
                </form>
		</tr>
        <tr>
          <form method="post">
                    <?php $fileZillaRunning = isFileZillaRunning(); ?>
                    <td class="<?php echo $fileZillaRunning ? 'positive' : 'error'; ?>"><h4>FileZilla Server</h4></td>
                    <td><?php echo getFileZillaPIDs(); ?></td>
                    <td><?php echo getFileZillaPorts(); ?></td>
                    <td><div class="ui icon buttons">
                            <?php if ($fileZillaRunning) : ?>
                            <button type="submit" name="start_stop_filezilla" class="ui button red"><i class="stop icon"></i>Stop</button>
                            <?php else : ?>
                            <button type="submit" name="start_stop_filezilla" class="ui button green"><i class="play icon"></i>Start</button>
                            <?php endif; ?>
                            <button type="submit" name="admin_filezilla" class="ui button"><i class="users icon"></i>Admin</button>
                            <button class="ui button"><i class="edit icon"></i>Config</button>
                            <div class="ui floating dropdown icon button"> <i class="dropdown icon"></i>
                                <div class="menu"> 
                                    <!-- IMPLEMENT CONFIG DROPDOWN --> 
                                </div>
                            </div>
                            <button type="submit" name="logs_filezilla" class="ui button"><i class="file alternate outline icon"></i>Logs</button>
                        </div></td>
                 </form>
        </tr>
        </tbody>
      </table>
      <div class="ui segment content"> </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script> 
<script>
  $(document).ready(function() {
    $('.ui.dropdown').dropdown();
  });
</script>
</body>
</html>
