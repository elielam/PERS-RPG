Arena = function(game) {
    // Appel des variables nécessaires
    this.game = game;
    var scene = game.scene;

    // Création de notre lumière principale
    var light = new BABYLON.HemisphericLight("light1", new BABYLON.Vector3(0, 1, 0), scene);

    // Création du sol
    var ground = BABYLON.Mesh.CreateGround("ground1", 20, 20, 2, scene);

    ground.scaling = new BABYLON.Vector3(2,10,3);
    ground.scaling.z = 2;

    // Notre premier cube qui va servir de modèle
    var mainBox = BABYLON.Mesh.CreateBox("box1", 3, scene);

    // Les trois clones
    var mainBox2 = mainBox.clone("box2");
    var mainBox3 = mainBox.clone("box3");
    var mainBox4 = mainBox.clone("box4");

    // Cylindre
    var cylinder = BABYLON.Mesh.CreateCylinder("cylinder", 20, 5, 5, 20, 5, scene);

};