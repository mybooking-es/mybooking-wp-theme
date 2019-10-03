<!-- Modal -->
<div class="modal fade" id="choose_productModal" tabindex="-1" role="dialog" aria-labelledby="choose_productModal"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modificar búsqueda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="search_form" method="get" enctype="application/x-www-form-urlencoded">
        <div class="modal-body">
          <div class="form-group w-100">
            <label class="control-label w-100">Lugar Entrega <i class="fas custom-icon fa-angle-down"></i>
              <select class="w-100" id="pickup_place" name="pickup_place">
              </select>
            </label>
          </div>
          <div class="form-group w-100">
            <label class="control-label w-100">Lugar Devolución <i class="fas custom-icon fa-angle-down"></i>
              <select class="w-100" id="return_place" name="return_place">
              </select>
            </label>
          </div>
          <div class="form-group">
            <label class="control-label w-100">Fecha Entrega
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                </div>
                <input type="text" class="form-control" id="date_from" name="date_from" />
                <select class="input-group-field" id="time_from" name="time_from">
                </select>
              </div>
            </label>
          </div>
          <div class="form-group">
            <label class="control-label w-100">Fecha Devolución
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                </div>
                <input type="text" class="form-control" id="date_to" name="date_to" />
                <select class="input-group-field" id="time_to" name="time_to">
                </select>
              </div>
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <input class="btn btn-primary" type="submit" value="Nueva búsqueda" />
        </div>
      </form>
    </div>
  </div>
</div>