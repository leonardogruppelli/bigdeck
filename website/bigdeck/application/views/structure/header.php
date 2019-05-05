<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Big Deck - Cards and Deck Management</title>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Roboto:300,400,500,700"
        rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet"
        href="<?php echo base_url('./assets/css/grid.css'); ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('./assets/css/text.css'); ?>">
    <link rel="stylesheet"
    href="<?php echo base_url('./assets/css/colors.css'); ?>">
    <link rel="stylesheet"
    href="<?php echo base_url('./assets/css/margins.css'); ?>">
    <link rel="stylesheet"
    href="<?php echo base_url('./assets/css/select.css'); ?>">
    <link rel="stylesheet"
    href="<?php echo base_url('./assets/css/style.css'); ?>">

      <!-- ICONS -->
    <link rel="stylesheet"
        href="<?php echo base_url('./assets/css/icons.css'); ?>">
</head>

<body class="secondary">
    <header class="primary">
        <div class="logo">
           <h1 class="title large no-margin"><strong class="text-red">BIG</strong>DECK</h1>
        </div>
        <!-- TABLE FILLER -->
        <div class="filler"></div>
        <!-- END TABLE FILLER -->
    </header>
    <ul class="sidebar primary text small">
        <li class="<?php echo ($this->router->fetch_class() == 'home' ? 'active' : ''); ?>">
            <i class="fas fa-chart-bar medium"></i>
            <a href="<?php echo base_url(''); ?>">Dashboard</a>
        </li>
        <li class="<?php echo ($this->router->fetch_class() == 'rarities' ? 'active' : ''); ?>">
            <i class="fas fa-dice-d6 medium"></i>
            <a href="<?php echo base_url('rarities'); ?>">Rarities</a>
        </li>
        <li class="<?php echo ($this->router->fetch_class() == 'types' ? 'active' : ''); ?>">
            <i class="fas fa-dice-d4 medium"></i>
            <a href="<?php echo base_url('types'); ?>">Types</a>
        </li>
        <li class="<?php echo ($this->router->fetch_class() == 'races' ? 'active' : ''); ?>">
            <i class="fas fa-dice-d8 medium"></i>
            <a href="<?php echo base_url('races'); ?>">Races</a>
        </li>
        <li class="<?php echo ($this->router->fetch_class() == 'classes' ? 'active' : ''); ?>">
            <i class="fas fa-dice-d10 medium"></i>
            <a href="<?php echo base_url('classes'); ?>">Classes</a>
        </li>
        <li class="<?php echo ($this->router->fetch_class() == 'cards' ? 'active' : ''); ?>">
            <i class="fas fa-dice-d12 medium"></i>
            <a href="<?php echo base_url('cards'); ?>">Cards</a>
        </li>
        <li class="<?php echo ($this->router->fetch_class() == 'decks' ? 'active' : ''); ?>">
            <i class="fas fa-dice-d20 medium"></i>
            <a href="<?php echo base_url('decks'); ?>">Decks</a>
        </li>
    </ul>
    <div class="content">