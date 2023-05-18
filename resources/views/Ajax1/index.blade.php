<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ajax Crud</h1>
    <form id="frm" >
        @csrf
        <input type="text" placeholder="name">
        <button type="submit" id="frmSubmit">Submit</button>

    </form>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer">    </script>
    <script>
            $("#frm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:"{{url('form_submit')}}",
            data: $('#frm').serialize();
            type:'post',
            success:function(result){
                console.log(result);
            }
        })

        // alert("test");
    });
    </script>

</body>
</html>
