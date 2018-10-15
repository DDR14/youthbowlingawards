<footer>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="pricing.php">PRICING</a>
                    </li>
                    <li>
                        <a href="term.php">TERMS</a>
                    </li>   
                    <li>
                        <a href="contact.php">CONTACT</a>
                    </li>
                    <li>
                        <a href="about.php">ABOUT US</a>
                    </li>                                                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <script src="_/js/bootstrap.js"></script>
    <script type="text/javascript">
        //mask
        $(function () {
            $("input[id='phone']").keyup(function () {
                var curchr = this.value.length;
                var curval = $(this).val();
                if (curchr == 3) {
                    $("input[id='phone']").val("(" + curval + ")" + "-");
                } else if (curchr == 9) {
                    $("input[id='phone']").val(curval + "-");
                }
            });
        });
    </script>       
</footer>


