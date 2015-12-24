<div class="container">
    <section id="content">
        <form action=<?php echo "'" . $this->client->getLink('register', 'tryreg') . "'"; ?> method="post">
            <h1>Sign Up</h1>
            <div>
                <input name='username' ; type="text" placeholder="Username" required="" id="username"/>
            </div>
            <div>
                <input name='password' ; type="password" placeholder="Password" required="" id="password"/>
            </div>
            <div>
                <input name='emailid' ; type="email" placeholder="Email address" required="" id="emailid"/>
            </div>
            <div>
                <span class="error" id="error"><?php echo $this->getError(); ?></span>
            </div>
            <div>
                <input type="submit" value="Sign Up"/>
                <a href=<?php echo "'" . $this->client->getLink('login', 'login') . "'"; ?>>Already a member? Sign
                    in</a>
            </div>
        </form><!-- form -->
    </section><!-- content -->
