<script>
        var reference = 
        (function setValue(id,value){
            document.getElementById(id).value = value;
            return setValue; 
        });
</script>