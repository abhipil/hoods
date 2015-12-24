<div class="container">
    <section id="content">
        <h1>Where do you belong?</h1>
        <div id="map"></div>
        <form action=<?php echo "'" . $this->client->getLink('register', 'profile') . "'"; ?> method="post">
            <input id="formaddress" type="textbox" id="formaddress" hidden>
            <input id="submit" type="submit" value="Submit">
        </form>
    </section><!-- content -->
