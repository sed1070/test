<?php
$id = $modx->documentIdentifier;
$showindocs = array(78, 218, 1020);

if (in_array($id, $showindocs)):
    $ids = $modx->getParentIds($id);

    if ((in_array(146, $ids)) || ($id == 146))
        $docs=$modx->getDocuments(array(1443,1266),1,0,'id,pagetitle,description');
    if ((in_array(53, $ids)) || ($id == 53))
       $docs=$modx->getDocuments(array(1444,1264),1,0,'id,pagetitle,description');
    if ((in_array(51, $ids)) || ($id == 51))
        $docs=$modx->getDocuments(array(1445,1265),1,0,'id,pagetitle,description');

    if(count($docs)){
    $modx->regClientStartupScript('http://code.jquery.com/jquery-latest.js" type="text/javascript');
    $modx->regClientStartupScript('http://bxslider.com/sites/default/files/jquery.bxSlider.min.js" type="text/javascript');

    $modx->regClientStartupHTMLBlock('
        <style type="text/css">
            #slider1{
                  padding-top: 4px;
            }
            #slider1 li{
                  text-align: center;
            }
.bx-wrapper{top:24px;}
         </style>
    ');
    ?>        

<script type="text/javascript">
  $(document).ready(function(){
    $('#slider1').show().bxSlider({
    auto: true,
    controls: false,
    speed:2500,
    autoHover:true,
    pause:5000
  });
  });
</script>
    <ul id="slider1" style="display:none;">
        <?
        
           foreach($docs as $val):
            ?>
            <li>
                <a href="<?php echo $modx->makeUrl($val['id']); ?>"><?php echo ($val['description']) ? $val['description'] : $val['pagetitle']; ?></a>                
            </li>
            <?
           endforeach;
        ?>
    </ul>
    <?php
    }
endif;
?>
?>