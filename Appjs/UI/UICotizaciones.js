function add(item, index) {
    let add = `
      <div class="row item-cotizacion">
          <div class="col-sm-4">
              <img class="border border-light" src="/${item.imagen}" alt="img" style="width: 150px; max-height:150px;">
          </div>
          <div class="col-sm-4">
              <h5 class="fw-bold">${item.nombre}</h5><span>${item.marca}</span>
              <p class="">Stock: <span>${item.stock}</span></p>
              <p class="">Precio x unidad: 
                  <span class="fw-bold fs-5 text-warning" id="precio-${item.id_producto}">${item.precio}</span>
                  <span class="fw-bold fs-5 text-warning">$</span>
              </p>
          </div>
          <div class="col-sm-4">
              <div class="row">
                  <div class="col">
                      <p class="">Precio x cantidad: 
                          <span class="fw-bold fs-5 text-warning" id="pc-${item.id_producto}">${item.precio}</span>
                          <span class="fw-bold fs-5 text-warning">$</span>
                      </p>
                      <label>Cantidad</label><br>
                      <a class="btn btn-outline-primary btn-sm" onclick="mas(${item.id_producto}, ${item.stock}, ${index})">
                          <span class="material-icons btn-cantidad">add</span>
                      </a>
                      <span class="fs-3 fw-bold text-primary" id="cantidad-${item.id_producto}">1</span>
                      <input type="hidden" id="${item.id_producto}" value="1">
                      <a class="btn btn-outline-primary btn-sm" onclick="menos(${item.id_producto}, ${index})">
                          <span class="material-icons btn-cantidad">remove</span>
                      </a>
                  </div>
                  <div class="col">
                      <a class="btn btn-sm" onclick="eliminar(${index})">
                          <span class="material-icons" style="color: #f44336;"> delete_outline </span>
                      </a>
                  </div>
              </div>
          </div>
       </div>
      `;
      return add;
  }