

<footer>
    <p>Posted by: Hege Refsnes</p>
    <p>Contact information: <a href="mailto:thangchina1997@gmail.com">
            Thangchina1997@gmail.com</a>.
    </p>
</footer>
</body>
</html>

<script>

    $(function(){
        $updateCart = $(".update-cart");
        $updateCart.click(function(e){
            e.preventDefault();
            $qty = $(this).parents("tr").find(".qty").val();
            console.log($qty);
            $key = $(this).attr("data-key");
            $.ajax({
                url: 'update-vehicle-cart.php',
                type: 'GET',
                data: {'qty':$qty, 'key':$key},
                success:function(data)
                {
                    if(data == 1)
                    {
                        alert("Cap nhat dat xe thanh cong");
                        location.href='/../vehicle-cart.php';
                    }
                    else
                    {
                        alert('kkk');
                    }
                },
            });


        });
    });
</script>