<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="text-center">Welcome to the hoods</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">You request to join the block, <?php echo $this->client->getBlockName() ?>, is
                    pending</p>
                <p class="text-center">Till then, why not have a look around</p>
                <p class="text-center">You can find members of your block and convince them how awesome you are</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Explore!</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->