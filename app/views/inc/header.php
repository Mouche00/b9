<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1a53866afa.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
                colors: {
                    ogyr: '#33186B',
                    hector: '#7360DF',
                    lancelot: '#C499F3',
                    lahaire: '#F2AFEF',
                }
            }
        }
        }
    </script>

    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body class="relative bg-gray-300 p-4 flex gap-8">
    <?php require APPROOT . '/views/inc/sidebar.php'; ?>
    <main class="w-[85%] flex flex-col gap-8"> <!-- Begin Main Container -->
        <?php require APPROOT . '/views/inc/navbar.php'; ?>

