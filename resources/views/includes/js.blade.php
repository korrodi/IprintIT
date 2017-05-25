<script type="text/javascript">
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>

<script type="text/javascript">
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function (now) {

            $(this).text(Math.ceil(now));
        }
    });
});
</script>

<script type="text/javascript">
$('a[href^=#]').on("click",function(){
    var t= $(this.hash);
    var t=t.length&&t||$('[name='+this.hash.slice(1)+']');
    if(t.length){
        var tOffset=t.offset().top;
        $('html,body').animate({scrollTop:tOffset-20},'slow');
        return false;
    }
});
</script>