<div class="form-group">
    <label class="col-md-3 control-label">启用手机接口：</label>
    <div class="col-md-9">
        <label><input name="data[<?php echo $dir;?>][wap]" type="checkbox" <?php if ($t['wap']) { ?>checked="checked" <?php } ?> value="1" /></label>
    </div>
</div>      
<div class="form-group">
    <label class="col-md-3 control-label">支付宝账号(Email)：</label>
    <div class="col-md-9">
        <label><input type="text" name="data[<?php echo $dir;?>][username]" class="form-control" size="30" value="<?php echo $t['username']?>" /></label>
    </div>
</div> 
<div class="form-group">
    <label class="col-md-3 control-label">合作者身份(parterID)：</label>
    <div class="col-md-9">
        <label><input type="text" name="data[<?php echo $dir;?>][id]" class="form-control" size="30" value="<?php echo $t['id']?>" /></label>
    </div>
</div> 
<div class="form-group">
    <label class="col-md-3 control-label">交易安全校验码(key)：</label>
    <div class="col-md-9">
        <label><input type="text" name="data[<?php echo $dir;?>][key]" size="40" class="form-control" value="<?php echo $t['key']?>" /></label>
    </div>
</div> 