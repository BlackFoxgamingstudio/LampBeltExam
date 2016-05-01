<div class="modal fade bs-example-modal-lg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Warning!</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to remove this user? This action cannot be undone&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <form class="inline" action="destroyUser" method="post">
          <input type="hidden" id="passId" name="id" value="">
          <input class="btn btn-danger" type="submit" value="Remove User">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->