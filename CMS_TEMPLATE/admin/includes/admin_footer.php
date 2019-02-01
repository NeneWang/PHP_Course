
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>




    <script >
         var div_box = "<div id='load-screen'><div id='loading'></div></div>'";
            $("body").prepend(div_box);
            $('#load-screen').delay(250).fadeOut(200, function(){
               $(this).remove(); 
            });
        
        
        $(document).ready(function(){
            
                  ClassicEditor
                .create( document.querySelector( '#body' ) )
                .catch( error => {
                    console.error( error );
                } );
            
            
         $("#selectAllBoxes").click(function(event) {
            if (this.checked) {
              $(".checkBoxes").each(function() {
                this.checked = true;
              });
            } else {
              $(".checkBoxes").each(function() {
                this.checked = false;
              });
            }
          });
            
             
        
        });   
        
        
        
        
       </script>
       
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
       