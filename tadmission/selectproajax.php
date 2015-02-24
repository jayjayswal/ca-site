<?php
if(isset($_POST['page'])){
$page=$_POST['page'];
}
else{
   header('Location: index.php');
}
if(trim($page)=="sidemenu"){
?>
<!-- side menu -->
<div class="cellbackground" id="sidemenu">
    <h3>Select Programme</h3>
     <hr />
      <dl id="sidemenuaccordian" class="accordion">
          <dt><a class='gray'>BCA</a></dt>
        <dd>
            <div>
                <ul class="accordion-menu">
                    <a href="bcaadmissiondetail.php"><li>BCA Admission Detail</li></a>
                </ul>
            </div>
        </dd>
        <dt><a class='gray'>MscST </a></dt>
        <dd>
            <div>
                <ul class="accordion-menu">
                    <a href="mscstadmissiondetail.php"> <li>MscST Admission Detail</li></a>
                </ul>
            </div>
        </dd>
            <span>&nbsp;</span>
    </dl>
</div>
<?php }
if(trim($page)=="bca"){

?>


<!-- bca credit system --> 
<div class="cellbackground" id="bcaadmissionDetail">
<h3>BCA Admission Detail</h3>
 <hr />

<dl id="infoacordian"  class="accordion">
    <?php

        require_once '../CMS/db/admission_detail_class.php';
        $de= admission_detail::getAllDetail("BCA");
        if($de!=0){
        foreach ($de as $detail)
        {
            echo "<dt><a class='gray'>".$detail->detail_title."</a></dt>";
            echo "<dd>$detail->detail_desc</dd>";
        }
        }
        else{
            echo "no detail updated yet";
        }
    ?>
    <span>&nbsp;</span>
</dl>
</div>
<?php }

if(trim($page)=="msc"){
?>

<!-- Mscst credit system --> 
<div class="cellbackground" id="mscstadmissionDetail">
<h3>MscST Admission Detail</h3>
 <hr />

<dl id="infoacordian"  class="accordion">
    <?php
        require_once '../CMS/db/admission_detail_class.php';
        $de= admission_detail::getAllDetail("Msc.ST");
        if($de!=0){
        foreach ($de as $detail)
        {
            echo "<dt><a class='gray'>".$detail->detail_title."</a></dt>";
            echo "<dd>$detail->detail_desc</dd>";
        }
        }
        else{
            echo "no detail updated yet";
        }
    ?>
   
    <span>&nbsp;</span>
</dl>
</div>

<?php }?>