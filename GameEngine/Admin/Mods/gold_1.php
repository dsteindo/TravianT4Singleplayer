<?php
#################################################################################
##                                                                             ##
##              -= YOU MUST NOT REMOVE OR CHANGE THIS NOTICE =-                ##
##                                                                             ##
## --------------------------------------------------------------------------- ##
##                                                                             ##
##  Project:       ZravianX                                                    ##
##  Version:       2011.11.05                                                  ##
##  Filename:      GameEngine/Admin/Mods/gold_1.php                            ##
##  Developed by:  Dzoki                                                       ##
##  Edited by:     ZZJHONS                                                     ##
##  License:       Creative Commons BY-NC-SA 3.0                               ##
##  Copyright:     ZravianX (c) 2011 - All rights reserved                     ##
##  URLs:          http://zravianx.zzjhons.com                                 ##
##  Source code:   http://www.github.com/ZZJHONS/ZravianX                      ##
##                                                                             ##
#################################################################################

include_once("validateAdminSession.php"); 

$id = $_POST['id'];
$admid = $_POST['admid'];
mysql_query("UPDATE ".TB_PREFIX."users SET gold = gold + ".$_POST['gold']." WHERE id = ".$id."");

$name = $database->getUserField($id,"username",0);
mysql_query("Insert into ".TB_PREFIX."admin_log values (0,$admid,'Added <b>".$_POST['gold']."</b> gold to user <a href=\'admin.php?p=player&uid=$id\'>$name</a> ',".time().")");

// header("Location: ../../../admin.php?p=player&uid=".$id."&g=ok");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=player&uid='.$id.'&g=ok');
?>