<!DOCTYPE html>
<html>
<head>
	<title>ELBase</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Modules -->
    <script src="Assets/app/glMatrix-1.2.min.js" type="text/javascript"></script>
    <script src="Assets/app/blocks.js" type="text/javascript"></script>
    <script src="Assets/app/helpers.js" type="text/javascript"></script>
    <script src="Assets/app/world.js" type="text/javascript"></script>
    <script src="Assets/app/render.js" type="text/javascript"></script>
    <script src="Assets/app/physics.js" type="text/javascript"></script>
    <script src="Assets/app/player.js" type="text/javascript"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">RPGame</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php if($_SESSION == null) { ?> <a class="nav-link" href="?page=home">Get Started <span class="sr-only">(current)</span></a> <?php } else { } ?>
            </li>
            <li class="nav-item">
                <?php if($_SESSION == null) { ?> <a class="nav-link disabled" href="?page=home">Home</a> <?php } else { ?> <a class="nav-link" href="?page=home">Home</a> <?php } ?>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-0">
            <?php if($_SESSION == null) {  } else { ?> <a class="nav-link" href="?page=home&action=signout"><span class="fa fa-sign-out"></span></a> <?php } ?>
            <?php if($_SESSION == null) {  } else { ?> <a class="nav-link" href="?page=home"> <?php echo $_SESSION["character"]->name(); ?> </a> <?php } ?>
        </ul>
    </div>
</nav>

	<?= $content ?>

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="Assets/three.js/build/three.js"></script>

</body>
</html>