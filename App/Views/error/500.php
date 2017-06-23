<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php print $_SESSION['oConfig']->getConfig()->info->title; ?></title>
    <link href="/public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/error.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1 class="error"><?php echo $varMessage; ?></h1>
</div>
</body>
</html>
