<?php


// clearCookie();
unset($_SESSION);
session_destroy();
unset($user);

?>
<script type="text/javascript">
    document.cookie = "PHPSESSID=;Path=/cv;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
</script>

<?php
header('Location: /index.php');
