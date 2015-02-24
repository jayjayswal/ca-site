<?php 
//if(!isset($_SERVER['HTTP_REFERER'])){
//    header("location: ../../access_denied.php?data=You don't have direct access to this page");
//}
require_once 'db/contact_detail_class.php'; ?>

<script src="textEditor/ckeditor.js"></script>

<form action="server/gen-detail/contact_detail_update.php" id="editdetail" method="post">

    <textarea  id="editor1" name="editor1" style="width:50px;">
		<?php $de=contact_detail::getdetail();   echo $de->detail; ?>
		</textarea>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script><br />
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
</form>
