<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `dorm_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
    <form action="upload.php" id="dorm-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>" required/>
        </div>
        <div class="form-group">
            <label for="status" class="control-label">Status</label>
            <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photo" class="control-label">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control form-control-sm rounded-0" accept="image/*" <?php echo isset($photo) ? '' : 'required'; ?> />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
<script>
	$(document).ready(function(){
		$('#dorm-form').submit(function(e){
			e.preventDefault();
            var _this = $(this);
			$('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_dorm",
				data: new FormData(_this[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error: err => {
					console.log(err);
					alert_toast("An error occurred", 'error');
					end_loader();
				},
				success: function(resp){
					if(typeof resp == 'object' && resp.status == 'success'){
						location.reload();
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg);
                            _this.prepend(el);
                            el.show('slow');
                            $("html, body, .modal").scrollTop(0);
                            end_loader();
                    }else{
						alert_toast("An error occurred", 'error');
						end_loader();
                        console.log(resp);
					}
				}
			});
		});
	});
</script>
