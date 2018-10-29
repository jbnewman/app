<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Main Template</title>
</head>
<body>
  <h1>Main Template</h1>
    <?= $APP->output ?>
    <?= (isset($APP->JS)?$APP->JS:''); ?>
</body>
</html>
