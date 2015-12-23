<html>
<head>
	<meta charset="UTF-8">
	<title>Parallax Scrolling Demo</title>
	<style>
		body { background-color: #000000; margin:0px; }
		canvas { background-color: #222222; }
	</style>
	<script src="/js/bin/pixi.js"></script>

</head>
<body >
	<script>
		var renderer = PIXI.autoDetectRenderer(document.body.clientWidth,document.body.clientHeight,{backgroundColor : 0x1099bb});
		document.body.appendChild(renderer.view);
		var action = "pointer";


		function clickHandler(event,info){
			if( action == 'lobby'){
				var xx = new PIXI.Sprite(PIXI.Texture.fromImage('/img/lobby.png'))
				xx.position.x = event.data.originalEvent.layerX;
				xx.position.y = event.data.originalEvent.layerY;
				xx.anchor.x = .5;
				xx.anchor.y = .5;
				xx.scale={x:.25,y:.25};
				stage.addChild(xx);
			}
			switch(info) {
				case 'menu-lobby':
				action = 'lobby';
				break;

				default:
				debugger;
			}

		}

		//renderer.view.onclick = clickHandler;


// create the root of the scene graph
var stage = new PIXI.Container();
stage.interactive = true;
// create a texture from an image path
var background = new  PIXI.Sprite(PIXI.Texture.fromImage('/img/OT_skyline.png'));
background.position = {x:0,y:document.body.clientHeight};
background.anchor = {x:0,y:1};
background.interactive = true;
background.on('mousedown',onButtonDown);
stage.addChild(background);
var texture = PIXI.Texture.fromImage('/img/menu.png');

// create a new Sprite using the texture
var menu = new PIXI.Sprite(texture);

// move the sprite to the center of the screen
menu.position.x = 0;
menu.position.y = 0;
menu.scale.x = .5;
menu.scale.y = .5;
menu.name = 'menu';
stage.addChild(menu);
menu.interactive = true;
menu
.on('mousedown',onButtonDown)
.on('touchstart',onButtonDown);
function onButtonDown(event){
	clickHandler(event,'menu-lobby');
	//debugger;
	console.log(x);
}


// start animating
animate();
function animate() {
	requestAnimationFrame(animate);

    // render the container
    renderer.render(stage);
}
</script>
</body>
</html>