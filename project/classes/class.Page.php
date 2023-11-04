<?php
class Page
{
    public $pageTitle;
    public $isSecure;
    public $user;

    public function __construct($PageInfo)
    {
 $this->pageTitle = $PageInfo["pageTitle"];
        $this->isSecure = isset($PageInfo['isSecure']) ? $PageInfo['isSecure'] : true;
        $this->user = new User();
        $this->doSecureActions();

    }

    private function getHeader()
    {
        ob_start();
        require_once("parts/header.php");
        return ob_get_clean();
     }

    private function getFooter()
    {
        ob_start();
        require_once("parts/footer.php");
        return ob_get_clean();
    }


    private function getSidebar()
    {
        ob_start();
        require_once("parts/sidebar.php");

        return ob_get_clean();
        ;
    }

    function doSecureActions(){
        if ($this->isSecure) {
            if ($this->user->isLoggedUser()) {

                // Do nothing
            } else {
                header("location:login.php");
                exit();
            }
        }


    }


    public function show($PageContent)
    {

        $HeaderContent = $this->getHeader();
        $SideBarContent = $this->getSidebar();
        $FooterContent = $this->getFooter();
        $pageTitle = $this->pageTitle;
        $FullPageContent = <<<HERE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$pageTitle</title>
  <link rel="stylesheet" href="static/styles.css">
</head>
<body>
<div id="container">
<div id="header">
$HeaderContent
</div>
<div id="mainarea">
<div id="sidebar">
$SideBarContent
</div>
<div id="content">
$PageContent
</div>
</div>
<div id="footer">
$FooterContent
</div>
</div>

</body>
</html>
HERE;

        print $FullPageContent;


    }
}
?>