<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
    <title><?= $title; ?></title>
</head>
<body>
    
    <div id="showCase">
        
        <?php $this->load->view($view); ?>
        
    </div>

</body>
</html>