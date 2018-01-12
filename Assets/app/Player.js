Player = function(game, canvas) {
    // La scène du jeu
    var scene = game.scene;

    // Flags
    var jump = false;

    // Initialisation de la caméra
    // On crée la caméra
    var camera = new BABYLON.FreeCamera("camera", new BABYLON.Vector3(0, 5, -10), scene);

    camera.applyGravity = false;
    camera.checkCollisions = true;

    camera.speed = 0.5;
    camera.angularSensibility = 1000;

    // On demande à la caméra de regarder au point zéro de la scène
    camera.setTarget(BABYLON.Vector3.Zero());

    // On affecte le mouvement de la caméra au canvas
    camera.attachControl(canvas, true);

    // Movement

    camera.keysUp = [90]; // Touche Z
    camera.keysDown = [83]; // Touche S
    camera.keysLeft = [81]; // Touche Q
    camera.keysRight = [68]; // Touche D;

    // Touche Espace
    window.addEventListener("keyup", onKeyUp, false);
    function onKeyUp(event){
        switch (event.keyCode) {
            case 32:
                camera.animations = [];
                var a = new BABYLON.Animation(    "a",    "position.y", 20,    BABYLON.Animation.ANIMATIONTYPE_FLOAT,    BABYLON.Animation.ANIMATIONLOOPMODE_CYCLE);
                // Animation keysvar
                keys = [];
                keys.push({ frame: 0, value: camera.position.y });
                keys.push({ frame: 10, value: camera.position.y + 2 });
                keys.push({ frame: 20, value: camera.position.y });
                a.setKeys(keys);
                var easingFunction = new BABYLON.CircleEase();
                easingFunction.setEasingMode(BABYLON.EasingFunction.EASINGMODE_EASEINOUT);
                a.setEasingFunction(easingFunction);
                camera.animations.push(a);
                scene.beginAnimation(camera, 0, 20, false);
        }};

};

