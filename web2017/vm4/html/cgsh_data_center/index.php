<?php
require_once("utils/inc.php");

$sidebar = [
  "Message" => [
    "Hello! Your IP is " . $ip,
    "You've requested " . $count . " times",
    "You are ". ($_SESSION['login'] ? "": "not") . " logged in" . ($_SESSION['login'] ? " as ".$usersess['username']: "")
  ],
  "Log" => []
];

foreach(db_all("SELECT * FROM log ORDER BY id DESC LIMIT 20") as $record) {
  array_push($sidebar['Log'], $record['content']);
}

?>



<?php include("utils/header.php"); ?>
  <div id="content-wrapper">
    <div id="content">
      <div style="border: 2px solid white; padding: 10px; position: fixed">
        <h1 style="color: white">H4ck3d by 4b4DGUY@CGMen</h1>
        <h3 style="color: white">I hacked your database yesterday, and this is part of the login information ;)</h3>
        <h3 style="color: white">Give me $$$ or I will let all the secrets out.</h3>
        <hr>
        <h4 style="color: white">emendate 4a6bea3a1792697a9b4788e34608408d</h4>
        <h4 style="color: white">erda 000d41eef022d452c5b9b7e640be9dc1</h4>
        <h4 style="color: white">epaminondas 40039cd1a452b33e5f5f7808747f6a5c</h4>
        <h4 style="color: white">exudate 971923f045ce86f36621e401672fef64</h4>
        <h4 style="color: white">ezmeralda 522a054708f940aafd7ecc76efb6897b</h4>
      </div>
      <h4>Announcements</h4>
      <dl>
        <dt>Sorry for our mistakes</dt>
        <dd>We are now dealing with a fatal problem, our servers are under attacks from a really bad hacker organization, 'CGMen'. Everything you've stored in our data center will be stolen, we have no idea, sorry. The register page is removed due to security issues. </dd>
        <dt>New feature!</dt>
        <dd>Our services now support MySQL database, which means you have a better choice to keep your passwords and important data here!</dd>
        <dt>Thank you!</dt>
        <dd>Thank you for your supports, we will be better with your donations!</dd>
        <dt>Hello, new users</dt>
        <dd>This is a free service, you can store anything here, we will keep your important data behind 100 firewalls, and encrypt them, ensuring only you can access them. Register for free!</dd>
      </dl>
      <h6>Who uses our services</h6>
      <blockquote>
        <p>I can't help to type all my password inside, this is just so amazing. <cite>&mdash; <abbr title="Invisible Pink Unicorn">5teve Jobs</abbr></cite></p>
      </blockquote>
      <blockquote>
        <p>I've never seen such an extremely safe place in the Internet, I will put all my AVs in CGSH Data Center<cite>&mdash; <abbr title="Invisible Pink Unicorn">D0nald John Trump</abbr></cite></p>
      </blockquote>
    </div>
  </div>
  <div id="sidebar-wrapper">
    <div id="sidebar">
      <?php foreach($sidebar as $name => $items) { ?>
        <h3><?=$name?></h3>
        <pre style="color: white"><?php foreach($items as $item) echo htmlentities($item)."\n"; ?></pre>
      <?php } ?>
    </div>
  </div>
<?php include("utils/footer.php"); ?>
