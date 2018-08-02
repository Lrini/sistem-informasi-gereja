    <!--file ajax-search.php -->
    <?php if(!isset($_GET['nama_kk'])):?>
    <!-- form quick search --> 
    <form name="form1" method="get" action=""> 
    Search : <input type="text" name="nama_kk" id="nama_kk"/> <input type="submit" value="Search"/> 
    </form> 
    <!-- tempat hasil pencarian ditampilkan -->
    <div id="result"></div>
    <!-- javascript -->
    <!-- jquery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript">
    	var allow = true;
    	$(document).ready(function(){
    		$("#nama_kk").keypress(function(e){
    			if(e.which == '13'){
    				e.preventDefault();
    				loadData();
    			}else if($(this).val().length >= 2){
    				loadData();
    			}
    		});
    	});
    	function loadData(){
    		if(allow){
    			allow = false;
    			$("#result").html('loading...');
    			$.ajax({
    				url:'ajax-search.php?q='+escape($("#nama_kk").val()),
    				success: function (data){
    					$("#result").html(data);
    					allow = true;
    				}
    			});
    		}
    	}
    </script>
    <?php endif;?>
    <?php 
    if(isset($_GET['nama_kk']) && $_GET['nama_kk']){ 
     $conn = mysql_connect("localhost", "root", ""); 
     mysql_select_db("hosanasungkaen"); 
     $nama_kk = $_GET['nama_kk']; 
     $sql = "select * from tb_kk where nama_kk like '%$nama_kk%'"; 
     $result = mysql_query($sql); 
     if(mysql_num_rows($result) > 0){ 
     ?> 
     <table> 
     <tr> 
     <td>Nama KK</td>  
     </tr> 
     <?php 
     while($tb_kk = mysql_fetch_array($result)){?> 
     <tr> 
     <td><?php echo $tb_kk['nama_kk'];?></td> 
     </tr> 
     <?php }?> 
     </table> 
     <?php 
     }else{ 
     echo 'Data not found!'; 
     } 
    } 
    ?>