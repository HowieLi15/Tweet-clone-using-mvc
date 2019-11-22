
<footer class="footer">
    <div class="container">
        <p>&copy  My website 2016 </p>
    </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodletitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="loginerror"></div>
                <form>
                    <input type="hidden" id="loginActive" name="loginActive" value="1">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>

                </form>


            </div>
            <div class="modal-footer">

                <button type="button" id="togglelogin">Sign up</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="loginsignupbutton">Login</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#togglelogin').click(function () {
        if($('#loginActive').val()=='1'){
            $('#loginActive').val('0');
            $('#loginmodletitle').html('Sign up');
            $('#loginsignupbutton').html('Sign up');
            $('#togglelogin').html('Login');

        }
        else{
            $('#loginActive').val('1');
            $('#loginmodletitle').html('Login');
            $('#loginsignupbutton').html('Login');
            $('#togglelogin').html('Sign up');
        }

    })
    $('#loginsignupbutton').click(function () {
        $.ajax({
            type:'POST',
            url:'actions.php?action=loginsignup',
            data:`email=${$('#email').val()}&password=${$('#password').val()}&loginActive=${$('#loginActive').val()}`,
            success:function (result) {
                if(result==1){
                    window.location.assign('http://localhost:8081/twitter/index.php?_ijt=8pvrh52vd8g7vk8ippl1qknng4');

                }
                else{
                    $('#loginerror').html(result).show();
                }
            }


        })
    })

</script>






</body>
</html>
