Arena = function(game) {
    // Appel des variables nécéssaires
    this.game = game;
    var scene = game.scene;

    // Création de notre lumière principale
    var light = new BABYLON.HemisphericLight("light1", new BABYLON.Vector3(0, 20, 0), scene);

    // Material pour le sol
    var materialGround = new BABYLON.StandardMaterial("wallTexture", scene);
    materialGround.diffuseTexture = new BABYLON.Texture("Assets/Img/brick.jpg", scene);
    materialGround.diffuseTexture.uScale = 4.0;
    materialGround.diffuseTexture.vScale = 4.0;

    // Material pour les objets
    var materialWall = new BABYLON.StandardMaterial("groundTexture", scene);
    materialWall.diffuseTexture = new BABYLON.Texture("Assets/Img/wood.jpg", scene);

    // Ajoutons un sol pour situer la sphère dans l'espace
    var ground = BABYLON.Mesh.CreateGround("ground1", 20, 20, 2, scene);
    ground.scaling = new BABYLON.Vector3(2,10,3);
    ground.scaling.z = 2;

    // SUR TOUS LES AXES Y -> On monte les meshes de la moitié de la hauteur du mesh en question.
    // var mainBox = BABYLON.Mesh.CreateBox("box1", 3, scene);
    // mainBox.scaling.y = 1;
    // mainBox.position = new BABYLON.Vector3(5,((3/2)*mainBox.scaling.y),5);
    // // Vu que cet objet sert de clone pour les autres, les deux valeurs ci-dessous sont clonées
    // mainBox.rotation.y = (Math.PI*45)/180;
    // mainBox.material = materialWall;

    // Les Murs

    var wallE = BABYLON.Mesh.CreateBox("wallE", 3, scene);
    wallE.scaling.z = 13.25;
    wallE.scaling.x = 0.05;
    wallE.scaling.y = 5;
    wallE.position = new BABYLON.Vector3(20,((3/2)*wallE.scaling.y),0);

    var wallO = BABYLON.Mesh.CreateBox("wallO", 3, scene);
    wallO.scaling.z = 13.25;
    wallO.scaling.x = 0.05;
    wallO.scaling.y = 5;
    wallO.position = new BABYLON.Vector3(-20,((3/2)*wallO.scaling.y),0);

    var wallN = BABYLON.Mesh.CreateBox("wallN", 3, scene);
    wallN.scaling.z = 13.25;
    wallN.scaling.x = 0.05;
    wallN.scaling.y = 5;
    wallN.rotation.y = (Math.PI*90)/180;
    wallN.position = new BABYLON.Vector3(0,((3/2)*wallN.scaling.y),20);

    var wallS = BABYLON.Mesh.CreateBox("wallN", 3, scene);
    wallS.scaling.z = 13.25;
    wallS.scaling.x = 0.05;
    wallS.scaling.y = 5;
    wallS.rotation.y = (Math.PI*90)/180;
    wallS.position = new BABYLON.Vector3(0,((3/2)*wallS.scaling.y),-20);

    ground.material = materialGround;
    wallE.material = materialWall;
    wallO.material = materialWall;
    wallN.material = materialWall;
    wallS.material = materialWall;

    ground.checkCollisions = true;
    wallE.checkCollisions = true;
    wallO.checkCollisions = true;
    wallN.checkCollisions = true;
    wallS.checkCollisions = true;

    // Skybox
    var skybox = BABYLON.Mesh.CreateBox("skyBox", 100.0, scene);
    var skyboxMaterial = new BABYLON.StandardMaterial("skyBox", scene);
    skyboxMaterial.backFaceCulling = false;
    skyboxMaterial.disableLighting = true;
    skybox.material = skyboxMaterial;
    skybox.infiniteDistance = true

    skyboxMaterial.reflectionTexture = new BABYLON.CubeTexture("Assets/Img/textures/universe/universe", scene);
    skyboxMaterial.reflectionTexture.coordinatesMode = BABYLON.Texture.SKYBOX_MODE;

};