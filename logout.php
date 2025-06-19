<?php
require_once 'server/Server.php';
session_destroy();
redir("login.php");
