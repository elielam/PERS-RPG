Ia = function (game) {

    var scene = game.scene;

    if ( enemysLength == null ) {
        alert("Vous êtes tous seul ici ..")
    } else {
        var i = 0;
        var indice = 10;
        var j = parseInt(enemysLength);
        while (i < j) {

            var posX = null;
            var posZ = null;

            i++;

            posX = Math.floor(Math.random() * indice) + 1;
            posZ = Math.floor(Math.random() * indice) + 1;

            var enemyLegR = BABYLON.Mesh.CreateBox("enemyLegR"+i, 1, scene);
            enemyLegR.scaling.y = 1;
            enemyLegR.scaling.x = 0.7;
            enemyLegR.scaling.z = 0.7;
            enemyLegR.position = new BABYLON.Vector3(posX,enemyLegR.scaling.y-0.5,posZ);

            var enemyLegL = BABYLON.Mesh.CreateBox("enemyLegL"+i, 1, scene);
            enemyLegL.scaling.y = 1;
            enemyLegL.scaling.x = 0.7;
            enemyLegL.scaling.z = 0.7;
            enemyLegL.position = new BABYLON.Vector3(posX+1,((1/1)*enemyLegL.scaling.y-0.5),posZ);

            var enemyBody = BABYLON.Mesh.CreateBox("enemyBody"+i, 2, scene);
            enemyBody.position = new BABYLON.Vector3(posX+0.5,enemyBody.scaling.y+((3/3)*enemyLegL.scaling.y),posZ);

            var enemyHead = BABYLON.Mesh.CreateBox("enemyHead"+i, 1, scene);
            enemyHead.scaling.y = 1.80;
            enemyHead.position = new BABYLON.Vector3(posX+0.5,(enemyBody.scaling.y+(enemyHead.scaling.y)),posZ);

            enemyLegR.checkCollisions = true;
            enemyLegL.checkCollisions = true;
            enemyBody.checkCollisions = true;
            enemyHead.checkCollisions = true;

            indice += 5;

        }
    }
}