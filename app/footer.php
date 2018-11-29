
<script>
    var modal = document.getElementById('modalId');
        document.getElementById('addBtn').onclick = function(e){modal.style.display = 'block';}
        document.getElementById('modalOff').onclick = function(e){modal.style.display = 'none';}
        document.getElementById('modalOff2').onclick = function(e){modal.style.display = 'none';}
        document.getElementById('modalOff3').onclick = function(e){modal.style.display = 'none';}
</script>
<script>

new Vue({
    el: '#wrap',
    data: {
        cats: ['Všetky','Nohavice','Šaty a Sukne','Bundy a Kabáty','Kardigány','Svetre','Pulóvre a tričká','Vesty','Košele a blúzky','Komplety a súpravy','Doplnky']
    }
})

</script>
</body>
</html>