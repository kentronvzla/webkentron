<!-- Hecho por Ing. Manuel Sayago Septiembre 2016/ Made by Engineer Manuel Sayago-->
<div class="col-xs-12 col-sm-9 col-md-9">
  <h4>Results</h4>
</div>
@foreach ($topicos as $topico)   
  <div class="col-xs-12 col-sm-9 col-md-9">
    <span class="style-font"><strong>{{ $topico->titulo }} -- </strong></span>
    <span>
      {{ $topico->descripcion }}
    </span>
  </div>
  <div class="stylesm col-xs-12 col-sm-9 col-md-9">
    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-comment"></span> Agregar Comentario
      </button>

    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-new-window"></span>Ver Detalles</button>
    <div class="lead stylesm">
        <div id="stars" class="starrr stylesm"></div>
          <span class="stylefont-star">You gave a rating of <span class="stylesm" id="count">0</span> star(s)
          </span>
      </div>
  <hr> <!-- Division between results -->
  </div>
@endforeach
{!! $topicos->appends(['category_id' => request('category_id'), 'name' => request('name')])->render() !!}    
      <!-- Modal for Comments -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Comments Section</h4>
            </div>
            <div class="modal-body">
              <!-- Modal Comments -->
              <div class="detailBox">
                <div class="titleBox">
                  <label>Comment Box</label>
                </div>
                <div class="commentBox">
                  <p class="taskDescription">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="actionBox">
                  <ul class="commentList">
                    <li>
                      <div class="commenterImage">
                        <img src="http://placekitten.com/50/50"/>
                      </div>
                      <div class="commentText">
                        <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
                      </div>
                    </li>
                    <li>
                      <div class="commenterImage">
                        <img src="http://placekitten.com/45/45"/>
                      </div>
                      <div class="commentText">
                        <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>
                      </div>
                    </li>
                    <li>
                      <div class="commenterImage">
                        <img src="http://placekitten.com/40/40" />
                      </div>
                      <div class="commentText">
                        <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
                      </div>
                    </li>
                  </ul>
                  <form class="form-inline" role="form">
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Your comments" />
                    </div>
                    <div class="form-group">
                      <button class="btn btn-default">Add</button>
                    </div>
                    <div class="lead stylesm">
                      <div id="stars" class="starrr stylesm"></div>
                        <span class="stylefont-star">You gave a rating of <span class="stylesm" id="count">0</span> star(s)</span>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Modal Comments -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

       
        <!-- View Details Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalles del Tópico</h4>
              </div>
              <div class="modal-body">
                <!-- View Details Modal Body -->
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>UNO</h3>
                      <div class="col-md-4">
                        <img src="#" alt="Preview">
                      </div>
                      <div class="col-md-4">
                        <p>DOS</p>
                      </div>
                    </div>
                    <section class="col-md-8">
                      <video width="800" height="400">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.
                      </video>
                    </section>
                    <section class="col-md-8">
                      <button type="button" class="btn btn-primary btn-lg raised">Download Video</button>
                      <button type="button" class="btn btn-primary btn-lg outline">Download Files</button>
                    </section>
                  </div>
                </div>
              </div> <!-- End View Details Modal Body -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div> <!-- End View Details Modal -->

        <!-- Rating Stars -->
      
