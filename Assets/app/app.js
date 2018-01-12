document.addEventListener("DOMContentLoaded", function () {
    new Game('renderSurface');
}, false);

Game = function(canvasId) {
    // Canvas et engine défini ici
    var canvas = document.getElementById(canvasId);
    var engine = new BABYLON.Engine(canvas, true);
    var _this = this;

    // On initie la scène avec une fonction associé à l'objet Game
    this.scene = this._initScene(engine);

    this.scene.ambientColor = new BABYLON.Color3.Black();

    // On ajoute le joueur
    var _player = new Player(_this, canvas);

    // On ajoute la map
    var _arena = new Arena(_this);

    // On ajoute le ou les enemys
    var _ia = new Ia(_this);


    // Permet au jeu de tourner
    engine.runRenderLoop(function () {
        _this.scene.render();
    });

    // Ajuste la vue 3D si la fenetre est agrandi ou diminué
    window.addEventListener("resize", function () {
        if (engine) {
            engine.resize();
        }
    },false);

    // Collision detect
    if (_player.intersectsMesh(_ia, true)) {
        console.log("collision");
    } else {
        console.log("Pas de collision");
    }

};


Game.prototype = {
    // Prototype d'initialisation de la scène
    _initScene : function(engine) {
        var scene = new BABYLON.Scene(engine);
        scene.clearColor=new BABYLON.Color3(0,0,0);
        return scene;
    }
};

