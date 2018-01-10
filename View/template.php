<!DOCTYPE html>
<html>
<head>

	<title>ELBase</title>
    <!--    Vendor    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--    App    -->
    <link rel="stylesheet" type="text/css" href="Assets/app/app.css">

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

    <!--    Vendor    -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdn.babylonjs.com/babylon.js"></script>
    <script src="https://code.jquery.com/pep/0.4.1/pep.js"></script>
    <!--    App    -->
    <script src="Assets/app/app.js"></script>
    <script src="Assets/app/Arena.js"></script>
    <script src="Assets/app/Player.js"></script>

</body>
</html>