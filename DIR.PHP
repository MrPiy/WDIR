<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body class="container">
	<div class="row">	
		<div class="panel panel-default">
			<div class="panel-heading">
				<button class="btn btn-sm btn-info cpath"><span class="glyphicon glyphicon-plus" title="创建文件夹"></span></button>
	      		<button class="btn btn-sm btn-warning upload"><span class="glyphicon glyphicon-cloud-upload "　title="上传文件"></span></button>
	      		<div class="dir_list"></div>
			</div>
			<div class="panel-body dir_table">
				
			</div>
		</div>
	</div>

<div class="row">
	<div class="modal fade create-path" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	    	<div class="modal-header">
	    		<h3 class="modal-title">创建文件夹</h3>
	    	</div>
	    	<div class="modal-body">
	    		<div class="input-group">
	    			<input type="text" name="cpath" class="form-control cpath-text">
	    			<div class="input-group-btn">
	    				<button class="btn btn-success cpath-btn">创建</button>
	    			</div>
	    		</div>
	    	</div>
	    	<div class="modal-footer">
    			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    	</div>
	    </div>
	  </div>
	</div>
</div>

<div class="row">
	<div class="modal fade upload_file" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-md" role="document">
	    <div class="modal-content">
	    	<div class="modal-header">
	    		<h2 class="modal-title">上传文件</h2>
	    	</div>
	    	<div class="modal-body">
	    		<div class="form-group">
                    <div class="input-group">
                        <input type="file" id="video" class="hide">
                        <input type="text" class="form-control" id="videoname" placeholder="点击上传文件" >
                        <div class="input-group-btn">
                            <button id="up" class="btn btn-success" disabled="disabled" >上传</button>
                        </div>
                    </div>
                </div>

                <div class="up_doing" >
                    <div class='form-group'>
                            <div class="progress" >
                                <div id="progress" class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                            <div id="precent" class="text-center"></div>
                    </div>
                </div>
	    	</div>
	    	<div class="modal-footer">
    			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  			</div>
	    </div>
	  </div>
	</div>
</div>

<div class="row">
	<div class="modal fade view_file" tabindex="-1" role="dialog">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	      			<h2 class="modal-title file_title">
	      				
	      			</h2>
	      		</div>
	      		<div class="modal-body text-center file_body">
	      			
	      		</div>
	      		<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  				</div>
	    	</div>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="modal fade view_login" tabindex="-1" role="dialog">
	  	<div class="modal-dialog modal-sm" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	      			<h2 class="modal-title login_title text-center">
	      				管理员登入
	      			</h2>
	      		</div>
	      		<div class="modal-body text-center login_body">
	      			<div class="input-group">
	      				<div class="input-group-addon">密码</div>
	      				<input type="password" name="password" id='password' class="form-control">
	      			</div>
	      		</div>
	      		<div class="modal-footer">
	      			<button class="btn btn-success" id='login'>Login</button>
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  				</div>
	    	</div>
	  	</div>
	</div>
</div>

	<script type="text/javascript">
		path('');
		function path(name){
			$.ajax({
				url:'to.php?path='+name,
				success:function(data){
					table(data);
				}
			})
		}
		function setKeyPath(num) {
			$.ajax({
				url:'to.php?keypath='+num,
				success:function(data){
					table(data);
				}
			})
		}
		function table(data){
			if(data.status){
				$(".dir_table").html("");
				var table=$("<table class='table'></table>");
				var trh=$("<tr><th>文件名</th><th>建立时间</th><th>大小</th><th></th><th>操作</th></tr>");
				trh.appendTo(table);
				
				for(d in data.directory){
					var tr=$("<tr></tr>");
					var td_n=$("<td>"+data.directory[d].name+"</td>");
					var td_t=$("<td>"+data.directory[d].ctime+"</td>");
					var td_s=$("<td>"+data.directory[d].size+"</td>");
					var td_a=$("<td></td>");
					var td_o=$("<td><span class='glyphicon glyphicon-remove text-danger' onclick=\"delete_path('"+data.directory[d].name+"','"+data.directory[d].basename+"')\"></span> <span class='glyphicon glyphicon-folder-open text-info' onclick=\"path('"+data.directory[d].name+"')\"></span></td>");
					tr.append(td_n);
					tr.append(td_t);
					tr.append(td_s);
					tr.append(td_a);
					tr.append(td_o);
					tr.appendTo(table);

				}
				for(f in data.file){
					var tr=$("<tr></tr>");
					var td_n=$("<td>"+data.file[f].name+"</td>");
					var td_t=$("<td>"+data.file[f].ctime+"</td>");
					var td_s=$("<td>"+data.file[f].size+"</td>");
					var td_a=$("<td></td>");
					var td_o=$("<td><span class='glyphicon glyphicon-eye-open text-info' onclick=\"view('"+data.file[f].name+"','"+data.file[f].basename+"','"+data.file[f].size+"','"+data.file[f].extension+"')\"></span> <span class='glyphicon glyphicon-remove text-danger' onclick=\"delete_file('"+data.file[f].name+"','"+data.file[f].basename+"')\"></span> <span class='glyphicon glyphicon-download-alt text-info' onclick=\"download('"+data.file[f].basename+"')\"></span></td>");
					tr.append(td_n);
					tr.append(td_t);
					tr.append(td_s);
					tr.append(td_a);
					tr.append(td_o);
					tr.appendTo(table);

				}
				table.appendTo(".dir_table");
				$('.dir_list').html("");
				for(l in data.dirArray){
					lc=parseInt(l)+1;
					var span=$("<span class='btn btn-sm btn-primary' style='margin:2px;' onclick=\"setKeyPath('"+lc+"')\">"+data.dirArray[l]+"</span> ");
					var ox=$("<span class='label label-default'><b>/</b></span>");
					span.appendTo('.dir_list');
					ox.appendTo('.dir_list');
				}
			}else{
				$(".view_login").modal('show');
			}
			

		}
		function download(info){//可以修改下载插件
			window.open(info);
		}
		function view(name,info,size,type){
				type=type.toLowerCase();
				$(".modal-body").html("");
				$(".modal-title").html("");
				switch(type){
					case 'gif':
					case 'jpg':
					case 'png':
						var head=$("<span>"+name+"<small> SIZE: "+size+" </small></span>");
						head.appendTo(".file_title");
						var download=$("<button class='btn btn-sm' onclick=\"download('"+info+"')\">Download</button>");
						download.appendTo(".file_title");

						var img=$("<img src=\""+info+"\" style=\"max-width:80%;max-height:80%\">");

						img.appendTo(".file_body");
						$(".view_file").modal('show');
					break;
					case 'mp4':
					case 'webm':
						var head=$("<span>"+name+"<small> SIZE: "+size+" </small></span>");
						head.appendTo(".file_title");
						var download=$("<button class='btn btn-sm' onclick=\"download('"+info+"')\">Download</button>");
						download.appendTo(".file_title");

						var video=$("<video src=\""+info+"\" style=\"max-width:80%;max-height:80%\"  controls=\"controls\" id=\"play\"></video>");

						video.appendTo(".file_body");
						$(".view_file").modal('show');

					break;
					case 'mp3':
						var head=$("<span>"+name+"<small> SIZE: "+size+" </small></span>");
						head.appendTo(".file_title");
						var download=$("<button class='btn btn-sm' onclick=\"download('"+info+"')\">Download</button>");
						download.appendTo(".file_title");
						var audio=$("<audio src=\""+info+"\" style=\"max-width:80%\"  controls=\"controls\" id=\"play\"></audio>");

						audio.appendTo(".file_body");
						$(".view_file").modal('show');
					break;
					case 'txt':
					case 'md':
					case 'ini':
					case 'json':
					case 'conf':
					case 'log':
					case 'html':
					case 'htm':
					case 'pdf':
						var head=$("<span>"+name+"<small> SIZE: "+size+" </small></span>");
						head.appendTo(".file_title");
						var download=$("<button class='btn btn-sm' onclick=\"download('"+info+"')\">Download</button>");
						download.appendTo(".file_title");
						var iframe=$("<div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\"  src=\""+info+"\" ></iframe></div>");
						iframe.appendTo(".file_body");
						$(".view_file").modal('show');
					break;
					default:
						var head=$("<span>"+name+"<small> SIZE: "+size+" </small></span>");
						head.appendTo(".file_title");
						var download=$("<button class='btn btn-sm' onclick=\"download('"+info+"')\">Download</button>");
						download.appendTo(".file_title");
						var TEXT=$("<h3>该文件不支持预览!</h3>");
						TEXT.appendTo(".file_body");
						$(".view_file").modal('show');
					break;

				}

				
		}
		
		$("#login").click(function(){
			var password=$("#password").val();
			$.ajax({
				url:'to.php?password='+password,
				success:function(data){
					if(data.status){
						path('');
						$(".view_login").modal('hide');
					}else{
						$("#password").val("");
						alert('Error password');
					}
				}
			})
		})
		$(".upload").click(function(){
			$(".upload_file").modal('show');
		})
		$(".view_file").on('hidden.bs.modal', function (e) {
  		var play=$("#play")[0];
  			play.pause();
		})


		var xhrOnProgress=function(fun) {
            xhrOnProgress.onprogress = fun; 
            return function() {
                var xhr = $.ajaxSettings.xhr();
                if (typeof xhrOnProgress.onprogress !== 'function')
                    return xhr;
                if (xhrOnProgress.onprogress && xhr.upload) {
                    xhr.upload.onprogress = xhrOnProgress.onprogress;
                }
                return xhr;
            }
        }
        $("#videoname").click(function(){
            $("#video").click();
            $("#video").val("");
            $("#videoname").val("");
            $("#videoname").attr("placeholder","点击上传文件");
        })
        $("#video").change(function(){
            var videoname=$(this).val();
            file=this.files[0];
            $("#videoname").val(videoname);
            $("#up").removeAttr("disabled");
        })

        $("#up").click(function(){
            var fd=new FormData();
          
            fd.append("file",file);
           
            $.ajax({
                url:"to.php",
                type:"POST",
                data:fd,
                processData: false,  // 告诉jQuery不要去处理发送的数据
                  contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
                  xhr:xhrOnProgress(function(e){
                      var pre=e.loaded/e.total;
                      $(".up_input").attr('disabled','disabled');
                      precent=Math.floor(pre*10000)/100;
                      $("#precent").html("<h4>"+precent+"%</h4>");
                      $("#progress").css('width',precent+"%");
                      if(precent>40){
                        $("#progress").addClass(" progress-bar-info");
                        $("#up").attr("disabled","disabled");
                      }
                      if(precent>90){
                        $("#progress").removeClass(" progress-bar-info");
                        $("#progress").addClass(" progress-bar-success");
                     }
                  }),
                success:function(data){
                    if(data.status){
                    	path('');
                       	alert('上传成功');
                    }else{
                        alert('上传失败');
                    }
                    $("#videoname").val("");
					$(".upload_file").modal('hide');
					$("#precent").html("<h4>0%</h4>");
                    $("#progress").css('width',"0%");
                }
            })
        })
        $(".cpath").click(function(){
        	$(".create-path").modal('show');
        })
        $(".cpath-btn").click(function(){
        	var cpath=$(".cpath-text").val();
        	if(cpath){
        		$.ajax({
        			url:'to.php',
        			data:{cpath:cpath},
        			success:function(data){
        				if(data.status){
        					path('');
        					alert('创建成功');
        				}else{
        					alert('创建失败');
        				}
        			}
        		})
        		$(".create-path").modal('hide');
        	}
        })
        function delete_file(name,dir){
        	jugg=confirm("是否删除该文件"+name+"请注意该操作是不可逆操作！");
        	if(jugg){
        		$.ajax({
	        		url:'to.php',
	        		data:{dfile:name},
	        		success:function(data){
	    				if(data.status){
	    					path('');
	    					alert('删除成功');
	    				}else{
	    					alert('删除失败');
	    				}
	    			}
        		})
        	}
        	
        }
         function delete_path(name,dir){
        	jugg=confirm("是否删除该目录"+name+"请注意该操作是不可逆操作！");
        	if(jugg){
        		$.ajax({
	        		url:'to.php',
	        		data:{dpath:name},
	        		success:function(data){
	    				if(data.status){
	    					path('');
	    					alert('删除成功');
	    				}else{
	    					alert('删除失败');
	    				}
	    			}
        		})
        	}
        	
        }
	</script>
</body>
</html>
