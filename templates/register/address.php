<div id="map"></div>
<div class="container">
    <section id="content">
        <h1>Where do you live?</h1>
        <input id="print" type="textbox" name="print" value="wait for it" hidden>
    </section><!-- content -->
</div><!-- container -->
<div id="floating-panel">
    <input id="address" type="textbox" placeholder="Enter your address">
</div>
<div>
    <form action=<?php echo "'" . $this->client->getLink('register', 'validaddr') . "'"; ?> method="post">
        <input id="formaddress" type="textbox" name="formaddress" hidden>
        <input id="lat" type="textbox" name="lat" hidden>
        <input id="lng" type="textbox" name="lng" hidden>
        <input id="blockid" type="textbox" name="blockid" hidden>
        <input id="submit" type="submit" name="submit" value="Submit">
    </form>
