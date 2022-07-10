<div class="cursoinfo">
    <img src="<?php echo BASE_URL?>assets/images/<?php echo $curso->getImagem();?>" height="60"/>
    <h3><?php echo $curso->getNome();?></h3>
    <?php echo $curso->getDesc();?>
</div>
<div class="curso_left">
    <?php foreach($modulos as $modulo):?>
        <div class="modulo"><?php echo $modulo['nome'];?></div>
        <?php foreach($modulo['aulas'] as $aula):?>
            <a class="hiperlink" href="<?php echo BASE_URL;?>cursos/aula/<?php echo $aula['id'];?>"><div class="aula"><?php echo $aula['nome'];?></div></a>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>
<div class="curso_right">
    ...
</div>