<!-- change the value of the input box -->
<?php include_once 'reference.php'; ?>
<script>
        var val;
        async function postF(text){
            let params = {
            "method": "POST",
            "headers": {
                "Content-Type": "text/plain; charset=utf-8"
            },
                "body": text
            }
            return fetch("prepareArtistForNewPaint.php", params).then(res=>res.text());
        }

       $(document).on('change', 'input', function() {
       // $("#artist").on('change', 'input', function() {
           // var options = $('datalist')[0].options;
          
            val = $(this).val();
            postF(val).then(function(result){
                if(result.length === 0){
                    hideBlock("artistInputForm");
                    
                }
                else{reference('artistid',result);}
               
            });
       });

    </script>

    <script>
       function hideBlock(elementid) {
            var x = document.getElementById(elementid);
            if (x.style.display === "none") {
                x.style.display = "block";
            } 
        }
        
    </script>