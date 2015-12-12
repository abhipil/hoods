<div class="container">
    <section id="content">
        <form action=<?php echo "'" . $this->client->getLink('login', 'login') . "'"; ?> method="post">
            <h1>Sign In</h1>
            <div>
                <input name='username' ; type="text" placeholder="Username" required="" id="username"/>
            </div>
            <div>
                <input name='password' ; type="password" placeholder="Password" required="" id="password"/>
            </div>
            <div>
                <span class="error" id="error"><?php echo $this->getError(); ?></span>
            </div>
            <div>
                <input type="submit" value="Log in"/>
                <a href="#">Lost your password?</a>
                <a href=<?php echo "'" . $this->client->getLink('register', 'register') . "'"; ?>>Register</a>
            </div>
        </form><!-- form -->
    </section><!-- content -->
</div><!-- container -->