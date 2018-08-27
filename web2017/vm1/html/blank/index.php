<?php
die((new SQLite3("/blank"))->query("SELECT '".$_GET['$']."'")->fetcharray()[0] != 0);
