
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mapa</title>
	<style>
		#svg-map path { fill:#0094d9 }
	    #svg-map text { fill:#fff; font:12px Arial-BoldMT, sans-serif; cursor:pointer }
	    #svg-map a{ text-decoration:none }
	    #svg-map a:hover { cursor:pointer; text-decoration:none }
	    #svg-map a:hover path{ fill:#003399 !important }
	    #svg-map .circle { fill:#66ccff }
	    #svg-map a:hover .circle { fill:#003399 !important; cursor:pointer }
	    #svg-map .active{ fill:#990000 !important }
	</style>
</head>
<body>
	<?php	
		require_once 'maps-brasil.php';
		$mapa = mapa_svg();
		$abrangencia = [
			'piaui','ceara','maranhao'
		];
		
	?>
	<div>
	  <svg version="1.1" id="svg-map" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="450px" height="460px" viewBox="0 0 450 460" enable-background="new 0 0 450 460" xml:space="preserve">
	    <g>
	      <?php foreach ($mapa as $key => $estado) {?>
	      <a xlink:href="#<?php echo $key?>">
	        <path  <?php if(in_array($key, $abrangencia)) echo 'class="active'; ?> stroke="#FFFFFF" stroke-width="1.0404" stroke-linecap="round" stroke-linejoin="round" d="<?php echo $estado['points']?>"></path>
	        <?php if(array_key_exists('circle', $estado)): ?>
	        	<path class="circle <?php if(in_array($key, $abrangencia)) echo 'active'; ?>" d="<?php echo $estado['circle']?>"></path>
	        <?php endif ?>
	        <text transform="matrix(<?php echo $estado['matrix']?>)" fill="#FFFFFF"><?php echo $estado['sigla']?></text>
	      </a>
	      <?php } ?>
	    </g>
	  </svg>
	</div>
</body>
</html>