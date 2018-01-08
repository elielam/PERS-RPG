var world = new World( 45, 45, 16 );
world.createFlatWorld( 2 );

// Set up renderer
var render = new Renderer( "renderSurface" );
render.setWorld( world, 8 );
render.setPerspective( 60, 0.01, 200 );

// Create physics simulator
var physics = new Physics();
physics.setWorld( world );

// Create new local player
var player = new Player();
player.setWorld( world );
player.setInputCanvas( "renderSurface" );

// Render loop
setInterval( function()
{
    var time = new Date().getTime() / 1000.0;

    // Simulate physics
    physics.simulate();

    // Update local player
    player.update();

    // Build a chunk
    render.buildChunks( 1 );

    // Draw world
    render.setCamera( player.getEyePos().toArray(), player.angles );
    render.draw();

    while ( new Date().getTime() / 1000 - time < 0.016 );
}, 1 );