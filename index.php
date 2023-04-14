<?php
//REUSABLE CONTENT

class Page
{
    public $content;
    public $title = "TLA Consulting Pty Ltd";
    public $description = "TLA Consulting. GLobal consultation center for your IT.";
    public $buttons = [
        "Home" => "home.php",
        "Services"=> "services.php",
        "Contact" => "contact.php",
        "Site Map" => "map.php"
    ];

    //Set accessor func

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    //Display page

    public function display()
    {
        echo "<html>\n<head>\n";
        $this->displayTitle();
        $this->displaydescription();
        $this->displayStyles();
        echo "</head> \n <body> \n";
        $this->displayHeader();
        $this->displayMenu($this->buttons);
        echo $this->content;
        $this->displayFooter();
        echo "</body>\n </html>\n";
    }

    //HELPER FUNCS

    public function displayTitle()
    {
        echo "<title>{ $this->title } </title>";
    }

    public function displaydescription()
    {
        echo "<meta name='description' content='{ $this->description }' />";
    }

    public function displayStyles()
    {
        ?>

<link href="styles.css" type="text/css" rel="stylesheet">

<?php
    }

     public function displayHeader()
     {
         ?>
<!-- page header -->

<header>
    <img src="logo.png" alt="TLA logo" height="70" width="70" />
    <h1>TLA Consulting</h1>
</header>

<?php
     }

    public function displayMenu(array $buttons):void
    {
        echo "<!-- menu -->
        <nav> ";
        
        foreach ($buttons as $name=> $url) {
            $isActive = !$this->isURLCurrentPage($url);
            $this->displayButton($name, $url, $isActive);

        }
        echo '</nav>' . PHP_EOL;
    }

    public function isURLCurrentPage($url)
    {
        if(strpos($_SERVER['PHP_SELF'], $url)=== false) {
            return false;
        } else {
            return true;
        }
    }

    public function displayButton($name, $url, $active = true)
    {
        if ($active) {
            ?>
<div class="menuitem">
    <a href="
                <?= $url  ?>
                ">
        <?= $name ?>
    </a>
</div>
<?php
        } else {
            ?>

<div class="menuitem">
    <?= $name ?>
</div>
<?php
        }
    }

    public function displayFooter()
    {
        ?>

<!-- page footer -->
<footer>
    <p>&copy; TLA Consulting Pty Ltd. <br>
        Please see our <a href="legal.php">Leagal information page.</a>
    </p>
</footer>
<?php
    }

}
?>
