<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url('footer/add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="1">
	                	<div class="row">
	                		<div class="col-md-12">
	                			<?php for($i=1;$i<=4;$i++) {?>
	                			<h5>Footer <?php echo $i;?><br><br></h5>
	                			<div class="form-group form-float">
                          <div class="form-line">
                            <input name="judul<?php echo $i;?>" class="form-control" value="<?php echo isset($val['judul'.$i]) ? $val['judul'.$i] : "";?>" required>
                            <label class="form-label">Judul</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div>
                            <label class="form-label">Kontent</label>
                            <textarea id="footer<?php echo $i;?>" name="content<?php echo $i;?>"><?php echo isset($val['content'.$i]) ? $val['content'.$i] : "";?></textarea>
                          </div>
                        </div>
                      	<?php } ?>
	                    </div>
	                  </div>
	                	<button type="submit" class="btn btn-warning btn-sm float-right width-100">Simpan</button>
	                	<button type="button" class="btn btn-outline-warning btn-sm float-right width-100 batal" style="margin-right:20px;">Batal</button>
	                	
	                </form>
                </div>
          </div>
        </div>
    </div>
</div>
<script>
  CKEDITOR.replace('footer1', {
    uiColor: '#CCEAEE',
		toolbarGroups : [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		],	
		removeButtons: 'Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,SpecialChar,PageBreak,Iframe,Smiley,About,ExportPdf,Print,Templates,PasteText,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting',
	});
	CKEDITOR.replace('footer2', {
    uiColor: '#ff0000',
		toolbarGroups : [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		],	
		removeButtons: 'Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,SpecialChar,PageBreak,Iframe,Smiley,About,ExportPdf,Print,Templates,PasteText,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting',
	});
	CKEDITOR.replace('footer3', {
    uiColor: '#ff9900',
		toolbarGroups : [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		],	
		removeButtons: 'Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,SpecialChar,PageBreak,Iframe,Smiley,About,ExportPdf,Print,Templates,PasteText,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting',
	});
	CKEDITOR.replace('footer4', {
    uiColor: '#ffff00',
		toolbarGroups : [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		],	
		removeButtons: 'Outdent,Indent,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,SpecialChar,PageBreak,Iframe,Smiley,About,ExportPdf,Print,Templates,PasteText,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting',
	});
</script>