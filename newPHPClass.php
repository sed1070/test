<?php
$id = $modx->documentIdentifier;
$showindocs = array(1020, 78, 218);

if (in_array($id, $showindocs)):
    $ids = $modx->getParentIds($id);

    if ((in_array(53, $ids)) || ($id == 53))
        $childrens = $modx->getDocumentChildren(142); //ru
    if ((in_array(146, $ids)) || ($id == 146))
        $childrens = $modx->getDocumentChildren(951); //ua
    if ((in_array(51, $ids)) || ($id == 51))
        $childrens = $modx->getDocumentChildren(1107); //en

    

    $modx->regClientStartupScript('http://bxslider.com/sites/default/files/jquery.bxSlider.min.js');
    $modx->regClientStartupScript(MODX_BASE_URL . 'assets/libs/slideshows/galleriffic/js/jquery-1.3.2.js');
    $modx->regClientStartupHTMLBlock('
        <style type="text/css">
            .bx-wrapper{
                position: absolute;
                top: 22px;
                width: 971px;
            }
        </style>
    ');
    ?>    

    <script type="text/javascript">

        $(function(){
            $('#slider1').bxSlider({
                auto: true,
                mode: 'fade',
                controls: false,
                autoHover:true,
                pause:4000
            }).css({'display':'block'});
        }); 

    </script>
    <ul id="slider1">
        <?
        foreach ($childrens as $key => $value) {
            ?>
            <li>
                <a href="<?php echo $modx->makeUrl($value['id']); ?>"><?php echo ($value['description']) ? $value['description'] : $value['pagetitle']; ?></a>
            </li>
            <?
        }
        ?>
    </ul>
    <?php
endif;
?>