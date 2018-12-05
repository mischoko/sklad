
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
    data () {
        return {
            cats: [
                { name: 'Všetky', url: '?all' },
                { name: 'Nohavice', url: '?nohavice' },
                { name: 'Šaty a Sukne', url: '?sukne' },
                { name: 'Bundy a Kabáty', url: '?bundy' },
                { name: 'Kardigány', url: '?kardigany' },
                { name: 'Svetre', url: '?svetre' },
                { name: 'Pulóvre a tričká', url: '?pulovre' },
                { name: 'Vesty', url: '?vesty' },
                { name: 'Košele a blúzky', url: '?bluzky' },
                { name: 'Súpravy', url: '?supravy' },
                { name: 'Doplnky', url: '?doplnky' }
            ],
            activeItem: undefined
        }
    },
    created () {
        this.activeItem = this.cats.find(cat => cat.url === '?<?php echo $getkey ?>');
    }
    
})

</script>
</body>
</html>