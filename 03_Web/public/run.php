<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
function run(){
  $.ajax({
      type:"GET",
        url:"https://local.gdb.kr/run.php",
      success:function(args){
      },
      error:function(e){

        }
  });
  $.ajax({
      type:"GET",
      url:"https://49.174.13.19:55555/run.php",
      success:function(args){
      }
    });

}

</script>
